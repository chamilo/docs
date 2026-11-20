# Verificação de Saúde

A Verificação de Saúde é um bloco pequeno no painel de administração que executa algumas checagens em tempo real na sua instalação e sinaliza qualquer coisa que precise de atenção — sem necessidade de vasculhar arquivos de configuração para identificar configurações incorretas comuns.

![O bloco Verificação de Saúde no painel de administração, mostrando o status de aprovação/falha para configurações de e-mail, atribuição de URL de administrador e checagens de permissão de arquivos](/.gitbook/assets/admin-health-check-block.png)

## Acessando a Verificação de Saúde

No painel de administração, o bloco **Verificação de Saúde** aparece ao lado dos demais blocos do painel — não é necessário clicar; os resultados são exibidos diretamente.

## As Checagens

* **Configurações de e-mail** — Verifica se uma string de conexão do mailer e um e-mail/nome "de" (remetente) estão configurados. Caso contrário, vincula às configurações de e-mail para correção.
* **Todas as URLs têm pelo menos um administrador atribuído** — Em uma instalação com várias URLs, verifica se cada URL de acesso tem pelo menos um administrador que possa gerenciá-la. Se alguma não tiver, vincula à página de atribuição de URL de acesso/usuário.
* **`.env` não é gravável** — `.env` armazena segredos e não deve ser gravável pelo servidor web após a instalação. Sinalizado como erro se for; vincula ao Guia de Segurança.
* **`config/` não é gravável** — O mesmo raciocínio de `.env`: este diretório não deve ser gravável pela web em operação normal. Vincula ao Guia de Segurança.
* **`var/cache` é gravável** — A checagem inversa: o Symfony precisa gravar em seu diretório de cache, portanto esta é sinalizada como erro se *não* for gravável. Vincula ao guia de Ajuste de Desempenho / otimização.
* **A pasta de instalação não está presente** — A pasta `public/main/install` é necessária apenas durante a instalação e deve ser removida depois. Isso é sinalizado como aviso (não como erro grave) se ainda existir, pois é um risco de menor gravidade do que as duas checagens de gravabilidade acima. Vincula ao Guia de Segurança.

## O Que Fazer a Respeito

Cada checagem vincula diretamente ao local em que você corrigiria o problema subjacente — uma página de configurações ou o guia correspondente. Percorra esta lista logo após a instalação e periodicamente depois (por exemplo, após uma transferência manual de arquivos ou alteração de permissões), pois uma checagem aprovada hoje não garante que continue assim. Para uma lista de verificação mais ampla de endurecimento em produção além destas seis checagens, consulte o [Guia de Segurança](appendix/security-guide.md).