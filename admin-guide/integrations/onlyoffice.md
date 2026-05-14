# OnlyOffice

A integração com o **OnlyOffice** permite que os usuários editem documentos (Word, Excel, PowerPoint) diretamente no navegador dentro do Chamilo, sem a necessidade de baixá-los.

## O que o OnlyOffice Oferece

* **Edição de documentos** — Edite arquivos .docx, .xlsx, .pptx no navegador
* **Compatibilidade de formato** — Total compatibilidade com os formatos do Microsoft Office
* **Sem necessidade de software de desktop** — Tudo funciona no navegador

> A edição colaborativa em tempo real depende do próprio OnlyOffice Document Server; o plugin do Chamilo abre e salva documentos através do servidor, mas não adiciona nem restringe essa capacidade.

## Configuração

1. Instale o **OnlyOffice Document Server** no seu servidor (ou utilize o serviço em nuvem do OnlyOffice)
2. Nas configurações da plataforma Chamilo, configure:
   * **URL do OnlyOffice Document Server** — O endereço do seu servidor OnlyOffice
   * **Chave secreta** — Para comunicação segura entre o Chamilo e o OnlyOffice
3. Ative a integração

## Como Funciona

Uma vez configurado, os usuários verão uma opção **Editar com OnlyOffice** ao visualizar tipos de documentos suportados na ferramenta Documentos. Ao clicar, o documento será aberto no editor do OnlyOffice dentro da interface do Chamilo.

As alterações são salvas automaticamente no armazenamento de documentos do Chamilo.

## Dicas

* **Servidor separado recomendado** — Assim como o BigBlueButton, o OnlyOffice Document Server deve ser executado em um servidor próprio para melhor desempenho
* **HTTPS obrigatório** — Tanto o Chamilo quanto o OnlyOffice devem ser servidos via HTTPS para que a integração funcione
* **Verifique os formatos** — O OnlyOffice funciona melhor com formatos do Office (.docx, .xlsx, .pptx). Outros formatos podem ter suporte limitado para edição.