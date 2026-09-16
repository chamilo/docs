# Ferramentas de Sistema

Esta página aborda os utilitários de manutenção e inspeção do bloco Sistema.

## Limpar Ficheiros Temporários

**Sistema > Limpar ficheiros temporários** mostra quantos ficheiros temporários de carregamento existem e quanto espaço ocupam, e depois permite eliminá-los — todos, ou apenas os ficheiros mais antigos do que uma idade configurável. Um modo de simulação (dry-run) permite pré-visualizar o que seria eliminado. A mesma ação também limpa ficheiros de compilação legados obsoletos e regenera os recursos CSS compilados.

Esta ação ignora deliberadamente os diretórios de cache do próprio Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` e os pools de cache) — limpa apenas ficheiros dispersos que acabaram noutro local sob `var/cache/`. **Não** deteta uma alteração feita em `.env` ou em `config/` (por exemplo, a ativação da documentação da API — ver [Ativar a Documentação da API](../installation/configuration.md#enable-the-api-documentation)). Para isso, é necessário acesso à consola para executar `php bin/console cache:clear`.

## Atualização do Sistema

**Sistema > Atualização do sistema** executa o fluxo de autoatualização do Chamilo diretamente a partir do painel de administração, como uma sequência de passos discretos e retomáveis:

1. **Estado** — Indica a versão instalada e a localização dos diretórios de atualização/preparação/cópia de segurança, bem como a chave de assinatura fidedigna em uso
2. **Verificar** — Consulta se existe uma versão mais recente na origem de atualização configurada
3. **Validar** — Descarrega o pacote de atualização e a respetiva assinatura, e verifica-os face à soma de verificação do manifesto e à chave pública fidedigna
4. **Pré-verificação** — Valida os requisitos do sistema e a compatibilidade antes de qualquer alteração
5. **Preparar** — Extrai o pacote verificado para um diretório de preparação isolado; nada na instalação em produção é alterado ainda
6. **Plano de aplicação** — Constrói um diff dos ficheiros a adicionar, substituir ou remover, com base no pacote preparado
7. **Aplicar ficheiros** — Copia os ficheiros para o destino. Exige confirmação explícita e cria uma cópia de segurança de cada ficheiro substituído, além de um ficheiro de bloqueio que impede a execução simultânea de uma segunda atualização
8. **Segurança das migrações / verificações pós-aplicação** — Valida as migrações de base de dados pendentes e o estado pós-instalação
9. **Executar pós-aplicação** — Executa comandos de consola pós-aplicação (como migrações de base de dados), mas apenas se a configuração do servidor permitir executá-los a partir da interface, e apenas depois de escrever uma frase de confirmação explícita e confirmar que foi feita uma cópia de segurança

Os passos de longa duração reportam o progresso, pelo que a página pode permanecer aberta em segurança enquanto terminam. A combinação de verificação de assinatura, preparação antes da aplicação, cópias de segurança antes da substituição, bloqueio de concorrência e confirmações escritas antes de alterações à base de dados destina-se a tornar este fluxo seguro sem acesso à consola — mas uma cópia de segurança manual antes de começar continua a ser uma boa prática; ver [Cópias de Segurança](../maintenance/backups.md).

## Informação de Ficheiros

**Sistema > Informação de ficheiros** lista todos os ficheiros de recursos carregados, pesquisáveis por nome, mostrando o caminho físico, se se trata de um órfão (não associado a nenhum curso ou sessão) e quantos locais o referenciam. A partir daqui pode associar um ficheiro órfão a um recurso, desassociá-lo ou eliminá-lo — útil para localizar e limpar armazenamento que já não pertence a nenhum curso.

## Recursos por Tipo

**Sistema > Recursos por tipo** permite escolher um tipo de recurso e ver, em todos os cursos e sessões, uma contagem agregada e uma lista de itens desse tipo, quando foram criados e (quando aplicável) quais os utilizadores associados. Use-o para responder a perguntas como «quantos fóruns existem em toda a plataforma» ou «quais os cursos com mais documentos».

## Listar Ícones

**Sistema > Listar ícones** é um catálogo navegável do conjunto de ícones incorporados do Chamilo, agrupados por categoria. É sobretudo útil ao desenvolver plugins ou temas e ao precisar de confirmar o nome exato de um ícone, mas está disponível aqui como referência geral.

## Ferramentas Apenas de Desenvolvimento

Dois itens adicionais podem aparecer neste bloco, mas apenas quando o servidor tem um diretório `tests/` presente — o que normalmente só acontece numa instalação de desenvolvimento ou de QA, nunca em produção:

* **Preenchedor de dados** gera grandes volumes de utilizadores, cursos e registos de utilizadores em linha fictícios, para testes de carga ou de QA.
* **Testador de e-mail** envia um e-mail de teste real através do mailer configurado da plataforma, para confirmar que as definições SMTP/correio funcionam de facto, e mostra falhas de envio recentes, se existirem.

Se não vir estas duas ligações, isso é esperado — significa que a instalação não tem um diretório `tests/`, que é o estado normal e correto para uma plataforma de produção.