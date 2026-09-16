# Verificação de Versão

A Verificação de Versão indica se a sua instalação do Chamilo está atualizada e — se optar por participar — regista a sua plataforma no projeto Chamilo para que possa ser contabilizada nas estatísticas agregadas de utilização.

## Dois Níveis de Verificação

**Não registada (estado predefinido):** O Chamilo tenta mesmo assim contactar `version.chamilo.org` para comparar a versão instalada com a versão mais recente, utilizando apenas o próprio pedido — não são enviados quaisquer detalhes da plataforma. O bloco apresenta um formulário de registo que explica o que o registo acrescenta, além de um botão **"Enable version check"** e de uma caixa de seleção **"Hide campus from public platforms list"**.

**Registada:** Clicar em "Enable version check" apenas altera duas definições locais — por si só, não envia nada. A partir daí, sempre que este bloco do painel é carregado, a sua plataforma envia um pedido a `version.chamilo.org` que inclui:

| Dados enviados | Finalidade declarada |
|-----------|-----------------|
| URL e nome do sítio da sua plataforma | Identifica qual o portal que está a comunicar |
| Endereço de e-mail de contacto do administrador | Explicitamente para que a equipa do Chamilo possa contactar os administradores sobre problemas críticos de segurança |
| Versão instalada | Para determinar se está atualizado |
| Contagens de cursos, utilizadores, utilizadores ativos e sessões | Agregadas em estatísticas não pessoais em `stats.chamilo.org` |
| Nome da organização e idioma da interface | Apenas agregação demográfica |
| Nome do administrador | Enviado, embora a sua finalidade não esteja claramente documentada no próprio código |
| Endereço IP do seu servidor | Utilizado para aproximar a localização da sua plataforma num mapa global de instalações |
| Indicador "Do not list campus", packager e um ID único da instância | Controla se aparece no diretório público e identifica comunicações repetidas da mesma instalação |

Se deixar **"Hide campus from public platforms list"** desmarcada, a sua plataforma também aparece na lista pública da comunidade em `version.chamilo.org/community.php`.

## Aceder à Verificação de Versão

Este bloco aparece diretamente no painel de administração — não existe uma página separada a visitar.

## Deve Ativá-la?

Trata-se de uma adesão explícita, e o compromisso é simples: em troca de partilhar os detalhes acima, recebe um aviso automático quando uma nova versão (incluindo correções de segurança) estiver disponível, e contribui para as estatísticas públicas de adoção do Chamilo. Se preferir não partilhar quaisquer detalhes da plataforma, simplesmente não clique em "Enable version check" — a verificação básica de atualização continua a ser executada sem registo. Se pretender o aviso de atualização mas não a listagem pública, registe-se e marque "Hide campus from public platforms list".