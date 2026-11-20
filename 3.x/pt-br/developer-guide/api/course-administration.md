# API de administração de cursos

O Chamilo 3.1 permite que integrações de administrador atualizem metadados de cursos e excluam cursos por meio do recurso de API `Course`. Essas operações foram adicionadas para sincronização com sistemas externos de administração, como um ERP.

## Permissões

| Operação | Método e endpoint | Função exigida |
|-----------|---------------------|---------------|
| Listar cursos | `GET /api/courses` | Professor ou administrador da plataforma |
| Visualizar um curso | `GET /api/courses/{id}` | Permissão para visualizar esse curso |
| Criar um curso | `POST /api/courses` | Professor ou administrador da plataforma |
| Atualizar um curso | `PATCH /api/courses/{id}` | **Administrador da plataforma (`ROLE_ADMIN`)** |
| Excluir um curso | `DELETE /api/courses/{id}` | **Administrador da plataforma (`ROLE_ADMIN`)** |

`PUT` não está configurado como uma operação neste recurso. Os professores devem continuar editando seus próprios cursos pela interface de configurações do curso; as novas operações de escrita da API são exclusivas do administrador.

Use uma conta autenticada ou uma credencial de integração com as permissões necessárias. Consulte [Autenticação da API](authentication.md).

## Atualizar metadados do curso

Envie uma requisição JSON Merge Patch da API Platform para alterar apenas as propriedades fornecidas no corpo:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

A requisição atualiza o curso existente em vez de criar um novo. A API aceita propriedades graváveis definidas pelo grupo de serialização `course:write`, sujeitas à validação da entidade. Exemplos incluem `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` e `duration`. Propriedades de relacionamento, como `categories`, exigem a representação de recurso esperada pela API; consulte a documentação OpenAPI em vez de enviar IDs arbitrários de banco de dados.

**Importante:** o `code` interno do curso **não** é gravável por meio desta operação PATCH. Não tente renomear o código interno de um curso enviando um campo `code` ou `visualCode`.

## Excluir um curso

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Esta é uma operação de administração **destrutiva**. O Chamilo chama o mesmo auxiliar de exclusão de cursos usado pela manutenção de cursos, em vez de excluir diretamente a entidade Doctrine. Ele limpa inscrições associadas, vínculos de sessão e de turma, dados de acompanhamento e a indexação de busca relacionada, conforme aplicável.

Em uma instalação **multi-URL**, a exclusão pode apenas desvincular o curso da URL de acesso atual, em vez de excluí-lo em todos os lugares. Os documentos do curso não são excluídos com a opção separada *excluir documentos exclusivos* da interface de manutenção. Não interprete uma exclusão pela API como garantia de que todos os documentos sejam removidos fisicamente.

Se uma dependência ativa impedir a exclusão (por exemplo, uma sequência de recursos), o endpoint pode responder com `409 Conflict`. Revise as dependências do curso e os backups antes de enviar requisições DELETE, especialmente em integrações em lote.

## Erros e observações operacionais

* Um chamador sem a função de administrador exigida é recusado; use uma conta corretamente autorizada, e não uma credencial de professor, para PATCH ou DELETE.
* Dados inválidos na requisição podem falhar na validação da entidade. Obtenha o curso atual antes de aplicar o patch e envie apenas as propriedades que pretende alterar.
* Essas operações são expostas pela API Platform; consulte a documentação OpenAPI da instância instalada para o esquema exato de resposta e os formatos de campo aceitos.
* Teste a exclusão de curso em um curso descartável, não em um curso que contenha registros de produção de alunos.

Para a administração de cursos na interface, consulte [Gerenciamento de cursos](../../admin-guide/courses/managing-courses.md). Para integrações de inscrição em sessões, consulte [Inscrição de alunos em sessões](session-students.md).

**Implementação:** `src/CoreBundle/Entity/Course.php` (operações `Patch` e `Delete`) e `src/CoreBundle/State/CourseDeleteProcessor.php`. Adicionado no commit `8cc9d4b33d` do Chamilo LMS.