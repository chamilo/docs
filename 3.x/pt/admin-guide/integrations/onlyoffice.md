# OnlyOffice

A integração com o **OnlyOffice** permite que os utilizadores editem documentos (Word, Excel, PowerPoint) diretamente no browser, dentro do Chamilo, sem os descarregar.

## O que o OnlyOffice oferece

* **Edição de documentos** — Edite ficheiros .docx, .xlsx e .pptx no browser
* **Compatibilidade de formatos** — Compatibilidade total com os formatos do Microsoft Office
* **Sem necessidade de software de ambiente de trabalho** — Tudo funciona no browser

> A edição colaborativa em tempo real depende do próprio OnlyOffice Document Server; o plugin do Chamilo abre e guarda documentos através do servidor, mas não adiciona nem restringe essa capacidade.

## Configuração

1. Instale o **OnlyOffice Document Server** no seu servidor (ou utilize o serviço na nuvem do OnlyOffice)
2. Nas definições da plataforma Chamilo, configure:
   * **OnlyOffice Document Server URL** — O endereço do seu servidor OnlyOffice
   * **Secret key** — Para comunicação segura entre o Chamilo e o OnlyOffice
3. Ative a integração

## Como funciona

Depois de configurado, os utilizadores veem a opção **Edit with OnlyOffice** ao visualizar tipos de documento suportados na ferramenta Documents. Ao clicar, o documento abre no editor OnlyOffice, dentro da interface do Chamilo.

As alterações são guardadas automaticamente no armazenamento de documentos do Chamilo.

## Dicas

* **Servidor separado recomendado** — Tal como o BigBlueButton, o OnlyOffice Document Server deve ser executado no seu próprio servidor para um melhor desempenho
* **HTTPS obrigatório** — Tanto o Chamilo como o OnlyOffice devem ser servidos através de HTTPS para que a integração funcione
* **Verifique os formatos** — O OnlyOffice funciona melhor com os formatos Office (.docx, .xlsx, .pptx). Outros formatos podem ter suporte de edição limitado.