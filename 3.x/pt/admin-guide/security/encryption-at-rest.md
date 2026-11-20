# Criptografia em repouso para campos de perfil de usuário

O Chamilo 3.1 pode, opcionalmente, criptografar campos pessoais selecionados do perfil antes de os armazenar no banco de dados. Esta primeira implementação abrange **biografia**, **telefone** e **endereço**. A criptografia está **desativada por padrão** e requer uma chave de criptografia privada. Ela não criptografa todas as informações do usuário nem substitui a segurança de disco, de banco de dados, de transporte ou de cópias de segurança.

## Antes de ativar a criptografia

Somente um administrador da plataforma com acesso ao servidor deve realizar a implantação. Primeiro, confirme que a instalação inclui as migrações do Chamilo 3.1 para o armazenamento de campos criptografados, faça uma cópia de segurança recuperável do banco de dados e planeje uma cópia de segurança da chave de criptografia **separadamente do banco de dados**. Teste os procedimentos de restauração antes de alterar dados de produção.

A chave é armazenada em `var/data-at-rest/master.key`, fora da raiz web pública. Nunca a publique, cole-a em um pedido de suporte nem a submeta ao Git. A perda da chave original pode tornar os dados criptografados ilegíveis. Não gere uma chave substituta se algum dado de usuário já estiver criptografado.

## Inicializar a chave

Execute o comando uma vez em modo de pré-visualização:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Se ele informar que não existem dados criptografados e que a chave pode ser provisionada, inicialize-a explicitamente:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Se o comando informar uma chave compatível existente, nenhuma substituição é realizada. Se existirem linhas criptografadas, mas a chave estiver ausente ou incompatível, **interrompa** e recupere a chave original.

## Escolher os campos protegidos

Abra **Administração > Configurações > Segurança** e selecione **Biografia**, **Telefone** e/ou **Endereço** na configuração de campos de usuário criptografados. Selecione apenas os campos que pretende proteger. Novas gravações nos campos selecionados usam criptografia autenticada (libsodium XChaCha20-Poly1305); os registros legados em texto simples permanecem legíveis até serem preenchidos retroativamente de forma explícita.

## Inspecionar e preencher retroativamente os dados existentes

Os comandos de preenchimento retroativo não modificam registros sem `--apply`. Prefira um único usuário de QA antes de um lote mais amplo:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Após verificar a disponibilidade da chave, a seleção de campos, as cópias de segurança e a conta de QA, execute um piloto intencional:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Substitua `102` pelo ID real de um usuário de teste. Para conjuntos de dados maiores, use o argumento opcional `--batch-size` (1–500), revise a saída do comando e o comportamento da aplicação, e planeje os lotes durante uma janela de manutenção. Não execute um preenchimento retroativo de todo o banco de dados sem uma estratégia de reversão testada.

## Limitações operacionais

- Esta é a primeira fase da criptografia em nível de campo, não a criptografia completa do banco de dados.
- Integrações e exportações mais antigas em SQL direto podem não saber como ler valores criptografados; verifique-as antes da implantação.
- Uma cópia de segurança do banco de dados **sem** uma chave recuperável correspondente é insuficiente.
- Não registre o conteúdo bruto dos campos nem inclua material da chave em diagnósticos.
- Reverter apenas o código da aplicação não descriptografa os valores armazenados.

Consulte [Configurações de segurança](../platform-settings/security-settings.md) para opções gerais de segurança da plataforma. Implementação: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).