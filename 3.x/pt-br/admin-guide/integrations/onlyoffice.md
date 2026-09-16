# OnlyOffice

A integração com o **OnlyOffice** permite que os usuários editem documentos (Word, Excel, PowerPoint) diretamente no navegador, dentro do Chamilo, sem baixá-los.

## O que o OnlyOffice oferece

* **Edição de documentos** — Edite arquivos .docx, .xlsx e .pptx no navegador
* **Compatibilidade de formatos** — Compatibilidade total com os formatos do Microsoft Office
* **Nenhum software de desktop necessário** — Tudo funciona no navegador

> A edição colaborativa em tempo real depende do próprio OnlyOffice Document Server; o plugin do Chamilo abre e salva documentos por meio do servidor, mas não adiciona nem restringe essa capacidade.

## Configuração

1. Instale o **OnlyOffice Document Server** no seu servidor (ou use o serviço em nuvem do OnlyOffice)
2. Nas configurações da plataforma Chamilo, configure:
   * **OnlyOffice Document Server URL** — O endereço do seu servidor OnlyOffice
   * **Secret key** — Para comunicação segura entre o Chamilo e o OnlyOffice
3. Ative a integração

## Como funciona

Depois de configurado, os usuários veem a opção **Editar com OnlyOffice** ao visualizar tipos de documento compatíveis na ferramenta Documentos. Ao clicar, o documento é aberto no editor do OnlyOffice, dentro da interface do Chamilo.

As alterações são salvas automaticamente no armazenamento de documentos do Chamilo.

## Dicas

* **Servidor separado recomendado** — Assim como o BigBlueButton, o OnlyOffice Document Server deve ser executado em um servidor próprio para melhor desempenho
* **HTTPS obrigatório** — Tanto o Chamilo quanto o OnlyOffice devem ser servidos via HTTPS para que a integração funcione
* **Verifique os formatos** — O OnlyOffice funciona melhor com os formatos do Office (.docx, .xlsx, .pptx). Outros formatos podem ter suporte limitado à edição.