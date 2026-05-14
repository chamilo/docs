# Modelos

O Chamilo utiliza modelos para certificados, documentos e e-mails. Você pode personalizar esses modelos para atender à identidade visual e aos requisitos da sua organização.

## Modelos de Certificados

Os modelos de certificados definem o layout e o conteúdo dos certificados concedidos aos alunos que atingem os limites de pontuação no livro de notas.

### Personalizando um Modelo de Certificado

Os modelos de certificados utilizam HTML e CSS com variáveis de espaço reservado:

| Variável | Substituído por |
|----------|-----------------|
| Nome do aluno | O nome completo do aluno |
| Nome do curso | O nome do curso |
| Data | A data em que o certificado foi obtido |
| Pontuação | A pontuação final do aluno |
| Código de barras | Um espaço reservado para código de barras (`((certificate_barcode))`) usado para verificação |

### Carregando um Modelo

1. Navegue até o gerenciamento de modelos de certificados
2. Faça o upload ou edite o modelo HTML
3. Use as variáveis de espaço reservado onde o conteúdo dinâmico deve aparecer
4. Salve

## Modelos de Documentos

Os professores podem usar modelos de documentos ao criar conteúdo na ferramenta de Documentos. Os modelos fornecem um layout inicial para tipos comuns de documentos.

### Gerenciando Modelos de Documentos

1. Navegue até o gerenciamento de modelos no painel de administração
2. Adicione novos modelos fazendo o upload de arquivos HTML
3. Os modelos ficam disponíveis para os professores quando eles criam novos documentos

## Dicas

* **Inclua seu logotipo** — Adicione o logotipo da sua organização aos modelos de certificados para um visual profissional
* **Teste com dados reais** — Visualize os certificados com dados reais de alunos antes de implantar o modelo
* **Mantenha os modelos simples** — Designs simples têm melhor impressão e parecem mais profissionais