# Verificação de Versão

A Verificação de Versão informa se a sua instalação do Chamilo está atualizada e — se você optar por isso — registra a sua plataforma no projeto Chamilo para que ela possa ser contabilizada nas estatísticas agregadas de uso.

## Dois Níveis de Verificação

**Não registrada (estado padrão):** o Chamilo ainda tenta contatar `version.chamilo.org` para comparar a versão instalada com o lançamento mais recente, usando apenas a própria requisição — nenhum detalhe da plataforma é enviado. O bloco exibe um formulário de registro explicando o que o registro acrescenta, além de um botão **"Enable version check"** e uma caixa de seleção **"Hide campus from public platforms list"**.

**Registrada:** clicar em "Enable version check" apenas altera duas configurações locais — por si só, não envia nada. A partir de então, toda vez que este bloco do painel é carregado, a sua plataforma envia uma requisição a `version.chamilo.org` que inclui:

| Dados enviados | Finalidade declarada |
|-----------|-----------------|
| URL e nome do site da sua plataforma | Identifica qual portal está se comunicando |
| E-mail de contato do administrador | Explicitamente para que a equipe do Chamilo possa contatar os administradores sobre problemas críticos de segurança |
| Versão instalada | Para determinar se você está atualizado |
| Contagens de cursos, usuários, usuários ativos e sessões | Consolidadas em estatísticas agregadas não pessoais em `stats.chamilo.org` |
| Nome da organização e idioma da interface | Apenas agregação demográfica |
| Nome do administrador | Enviado, embora a sua finalidade não esteja claramente documentada no próprio código |
| Endereço IP do seu servidor | Usado para aproximar a localização da sua plataforma em um mapa global de instalações |
| Sinalizador "Do not list campus", empacotador e um ID único da instância | Controla se você aparece no diretório público e identifica verificações repetidas da mesma instalação |

Se você deixar **"Hide campus from public platforms list"** desmarcada, a sua plataforma também aparece na lista pública da comunidade em `version.chamilo.org/community.php`.

## Acessando a Verificação de Versão

Este bloco aparece diretamente no painel de administração — não há uma página separada a visitar.

## Você Deve Ativá-la?

Trata-se de uma adesão explícita, e o equilíbrio é direto: em troca de compartilhar os detalhes acima, você recebe um aviso automático quando uma nova versão (incluindo correções de segurança) estiver disponível e contribui para as estatísticas públicas de adoção do Chamilo. Se preferir não compartilhar nenhum detalhe da plataforma, simplesmente não clique em "Enable version check" — a verificação básica de atualização ainda é executada sem registro. Se quiser o aviso de atualização, mas não a listagem pública, registre-se e marque "Hide campus from public platforms list".