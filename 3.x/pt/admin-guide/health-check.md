# Verificação de Saúde

A Verificação de Saúde é um pequeno bloco no painel de administração que executa um conjunto de verificações em tempo real na sua instalação e sinaliza tudo o que precisa de atenção — sem necessidade de vasculhar ficheiros de configuração para detetar erros comuns de configuração.

![O bloco Health check no painel de administração, a mostrar o estado de aprovação/falha para as definições de e-mail, a atribuição de URL de administrador e as verificações de permissões de ficheiros](../.gitbook/assets/admin-health-check-block.png)

## Aceder à Verificação de Saúde

No painel de administração, o bloco **Health check** aparece juntamente com os outros blocos do painel — não é necessário clicar; os resultados são apresentados diretamente.

## As Verificações

* **E-mail settings** — Verifica se uma cadeia de ligação do mailer e um e-mail/nome "from" estão configurados. Caso contrário, liga para Mail settings para corrigir.
* **All URLs have at least one admin assigned** — Numa instalação multi-URL, verifica se cada URL de acesso tem pelo menos um administrador que a possa gerir. Se alguma não tiver, liga para a página de atribuição de URL de acesso/utilizador.
* **`.env` is not writable** — O `.env` contém segredos e não deve ser gravável pelo servidor web após a instalação. Sinalizado como erro se o for; liga para o Security Guide.
* **`config/` is not writable** — O mesmo raciocínio que para o `.env`: este diretório não deve ser gravável pela web em funcionamento normal. Liga para o Security Guide.
* **`var/cache` is writable** — A verificação inversa: o Symfony precisa de escrever no seu diretório de cache, pelo que esta é sinalizada como erro se *não* for gravável. Liga para o guia de Performance Tuning / optimization.
* **Install folder is not present** — A pasta `public/main/install` só é necessária durante a instalação e deve ser removida depois. Isto é sinalizado como aviso (não como erro grave) se ainda existir, uma vez que o risco é de menor gravidade do que as duas verificações de gravabilidade acima. Liga para o Security Guide.

## O Que Fazer

Cada verificação liga diretamente ao sítio onde corrigiria o problema subjacente — uma página de definições ou o guia relevante. Percorra esta lista imediatamente após a instalação e periodicamente depois (por exemplo, após uma transferência manual de ficheiros ou uma alteração de permissões), pois uma verificação bem-sucedida hoje não garante que assim permaneça. Para uma lista de verificação mais ampla de reforço de produção para além destas seis verificações, consulte o [Security Guide](appendix/security-guide.md).