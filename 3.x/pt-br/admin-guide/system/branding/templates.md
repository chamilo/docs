# Modelos

O Chamilo utiliza modelos para certificados, documentos e e-mails. Você pode personalizar esses modelos para adequá-los à identidade visual e aos requisitos da sua organização.

## Modelos de certificado

Os modelos de certificado definem o layout e o conteúdo dos certificados concedidos aos alunos que atingem os limiares do boletim de notas.

### Personalizando um modelo de certificado

Os modelos de certificado usam HTML e CSS com variáveis de espaço reservado:

| Variável | Substituída por |
|----------|-------------|
| Student name | O nome completo do aluno |
| Course name | O nome do curso |
| Date | A data em que o certificado foi obtido |
| Score | A pontuação final do aluno |
| Barcode | Um espaço reservado de código de barras (`((certificate_barcode))`) usado para verificação |

### Enviando um modelo

1. Navegue até o gerenciamento de modelos de certificado
2. Envie ou edite o modelo HTML
3. Use as variáveis de espaço reservado onde o conteúdo dinâmico deve aparecer
4. Salve

## Modelos de documento

Os professores podem usar modelos de documento ao criar conteúdo na ferramenta Documentos. Os modelos fornecem um layout inicial para tipos comuns de documentos.

### Gerenciando modelos de documento

1. Navegue até o gerenciamento de modelos no painel de administração
2. Adicione novos modelos enviando arquivos HTML
3. Os modelos ficam disponíveis para os professores quando eles criam novos documentos

## Dicas

* **Inclua o seu logotipo** — Adicione o logotipo da sua organização aos modelos de certificado para um visual profissional
* **Teste com dados reais** — Visualize os certificados com dados reais dos alunos antes de implantar o modelo
* **Mantenha os modelos simples** — Designs simples imprimem melhor e têm aparência profissional