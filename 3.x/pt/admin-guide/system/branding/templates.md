# Modelos

O Chamilo utiliza modelos para certificados, documentos e e-mails. Pode personalizar estes modelos para corresponder à identidade visual e aos requisitos da sua organização.

## Modelos de certificado

Os modelos de certificado definem o layout e o conteúdo dos certificados atribuídos aos formandos que atingem os limiares do livro de notas.

### Personalizar um modelo de certificado

Os modelos de certificado utilizam HTML e CSS com variáveis de substituição:

| Variável | Substituída por |
|----------|-------------|
| Student name | O nome completo do formando |
| Course name | O nome do curso |
| Date | A data em que o certificado foi obtido |
| Score | A pontuação final do formando |
| Barcode | Um espaço reservado para código de barras (`((certificate_barcode))`) utilizado para verificação |

### Carregar um modelo

1. Navegue até à gestão de modelos de certificado
2. Carregue ou edite o modelo HTML
3. Utilize as variáveis de substituição onde o conteúdo dinâmico deve aparecer
4. Guarde

## Modelos de documento

Os professores podem utilizar modelos de documento ao criar conteúdos na ferramenta Documentos. Os modelos fornecem um layout inicial para tipos de documento comuns.

### Gerir modelos de documento

1. Navegue até à gestão de modelos no painel de administração
2. Adicione novos modelos carregando ficheiros HTML
3. Os modelos ficam disponíveis para os professores quando criam novos documentos

## Dicas

* **Inclua o seu logótipo** — Adicione o logótipo da sua organização aos modelos de certificado para um aspeto profissional
* **Teste com dados reais** — Pré-visualize os certificados com dados reais de formandos antes de implementar o modelo
* **Mantenha os modelos simples** — Designs simples imprimem melhor e têm um aspeto profissional