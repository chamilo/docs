# Ferramentas do Sistema

Esta página aborda os utilitários de manutenção e inspeção do bloco Sistema.

## Limpar Arquivos Temporários

**Sistema > Limpar arquivos temporários** mostra quantos arquivos temporários de upload existem e quanto espaço ocupam, e então permite removê-los — todos, ou apenas os arquivos mais antigos que uma idade configurável. Um modo de simulação (dry-run) permite visualizar o que seria excluído antes. A mesma ação também limpa arquivos de build legados obsoletos e regenera os assets CSS compilados.

Esta ação deliberadamente ignora os próprios diretórios de cache do Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` e os pools de cache) — ela limpa apenas arquivos avulsos que acabaram em outro lugar sob `var/cache/`. Ela **não** aplicará uma alteração feita em `.env` ou em `config/` (por exemplo, habilitar a documentação da API — consulte [Habilitar a documentação da API](../installation/configuration.md#enable-the-api-documentation)). Para isso, é necessário acesso ao shell para executar `php bin/console cache:clear`.

## Atualização do Sistema

**Sistema > Atualização do sistema** executa o fluxo de autoatualização do Chamilo diretamente no painel administrativo, como uma sequência de etapas discretas e retomáveis:

1. **Status** — Informa a versão instalada e onde estão os diretórios de atualização/staging/backup, juntamente com a chave de assinatura confiável em uso
2. **Verificar** — Consulta se há uma versão mais recente disponível na origem de atualização configurada
3. **Validar** — Baixa o pacote de atualização e sua assinatura, e os confere com o checksum do manifesto e a chave pública confiável
4. **Pré-voo** — Valida os requisitos do sistema e a compatibilidade antes de qualquer alteração
5. **Preparar (Stage)** — Extrai o pacote verificado em um diretório de staging isolado; nada na instalação em produção é alterado ainda
6. **Plano de aplicação** — Constrói um diff dos arquivos a adicionar, substituir ou remover, com base no pacote em staging
7. **Aplicar arquivos** — Copia os arquivos para o lugar. Isso exige confirmação explícita e cria um backup de cada arquivo sobrescrito, além de um arquivo de lock que impede que uma segunda atualização seja executada ao mesmo tempo
8. **Segurança da migração / verificações pós-aplicação** — Valida as migrações de banco de dados pendentes e o estado pós-instalação
9. **Executar pós-aplicação** — Executa comandos de console pós-aplicação (como migrações de banco de dados), mas somente se a configuração do servidor permitir executá-los pela interface, e somente depois que você digitar uma frase de confirmação explícita e confirmar que um backup foi feito

As etapas de longa duração relatam o progresso para que a página possa permanecer aberta com segurança enquanto elas são concluídas. A combinação de verificação de assinatura, staging antes da aplicação, backups antes da sobrescrita, lock de concorrência e confirmações digitadas antes de alterações no banco de dados foi concebida para tornar este fluxo seguro sem acesso ao shell — mas um backup manual antes de começar continua sendo uma boa prática; consulte [Backups](../maintenance/backups.md).

## Informações de Arquivos

**Sistema > Informações de arquivos** lista todos os arquivos de recurso enviados, pesquisáveis por nome, mostrando o caminho físico, se é um órfão (não vinculado a nenhum curso ou sessão) e em quantos lugares é referenciado. A partir daqui você pode anexar um arquivo órfão a um recurso, desanexá-lo ou excluí-lo — útil para localizar e limpar armazenamento que não pertence mais a nenhum curso.

## Recursos por Tipo

**Sistema > Recursos por tipo** permite escolher um tipo de recurso e ver, em todos os cursos e sessões, uma contagem agregada e a lista de itens daquele tipo, quando foram criados e (quando aplicável) quais usuários estão associados a eles. Use-o para responder a perguntas como “quantos fóruns existem em toda a plataforma” ou “quais cursos têm mais documentos”.

## Listar Ícones

**Sistema > Listar ícones** é um catálogo navegável do conjunto de ícones nativos do Chamilo, agrupado por categoria. É principalmente útil ao desenvolver plugins ou temas e precisar confirmar o nome exato de um ícone, mas é exposto aqui como referência geral.

## Ferramentas Somente para Desenvolvimento

Dois itens adicionais podem aparecer neste bloco, mas somente quando o servidor possui um diretório `tests/` — o que normalmente ocorre apenas em uma instalação de desenvolvimento ou QA, nunca em produção:

* **Preenchedor de dados** gera grandes volumes de usuários, cursos e registros de usuários online fictícios, para testes de carga ou QA.
* **Testador de e-mail** envia um e-mail de teste real pelo mailer configurado da plataforma, para confirmar que as configurações SMTP/de e-mail realmente funcionam, e exibe falhas recentes de envio, se houver.

Se você não vir esses dois links, isso é esperado — significa que sua instalação não possui um diretório `tests/`, que é o estado normal e correto para uma plataforma em produção.