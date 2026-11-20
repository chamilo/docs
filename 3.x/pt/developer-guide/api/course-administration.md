# API de Administração de Cursos

O Chamilo 3.1 permite que integrações de administrador atualizem os metadados dos cursos e eliminem cursos através do recurso de API `Course`. Estas operações foram adicionadas para sincronização com sistemas de administração externos, como um ERP.

## Permissões

| Operação | Método e endpoint | Função necessária |
|-----------|---------------------|---------------|
| Listar cursos | `GET /api/courses` | Professor ou administrador da plataforma |
| Ver um curso | `GET /api/courses/{id}` | Permissão para ver esse curso |
| Criar um curso | `POST /api/courses` | Professor ou administrador da plataforma |
| Atualizar um curso | `PATCH /api/courses/{id}` | **Administrador da plataforma (`ROLE_ADMIN`)** |
| Eliminar um curso | `DELETE /api/courses/{id}` | **Administrador da plataforma (`ROLE_ADMIN`)** |

`PUT` não está configurado como operação neste recurso. Os professores devem continuar a editar os próprios cursos através da interface de configurações do curso; as novas operações de escrita da API destinam-se apenas a administradores.

Utilize uma conta autenticada ou uma credencial de integração com as permissões necessárias. Consulte [Autenticação da API](authentication.md).

## Atualizar metadados do curso

Envie um pedido JSON Merge Patch do API Platform para alterar apenas as propriedades fornecidas no corpo:

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

O pedido atualiza o curso existente em vez de criar um novo. A API aceita propriedades graváveis definidas pelo grupo de serialização `course:write`, sujeitas à validação da entidade. Os exemplos incluem `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky` e `duration`. Propriedades de relação, como `categories`, exigem a representação de recurso esperada pela API; consulte a documentação OpenAPI em vez de enviar IDs arbitrários da base de dados.

**Importante:** o `code` interno do curso **não** é gravável através desta operação PATCH. Não tente renomear o código interno de um curso enviando um campo `code` ou `visualCode`.

## Eliminar um curso

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Esta é uma operação de administração **destrutiva**. O Chamilo invoca o mesmo auxiliar de eliminação de cursos utilizado pela manutenção de cursos, em vez de eliminar diretamente a entidade Doctrine. Limpa as inscrições associadas, as ligações a sessões e turmas, os dados de acompanhamento e a indexação de pesquisa relacionada, conforme aplicável.

Numa instalação **multi-URL**, a eliminação pode apenas desassociar o curso do URL de acesso atual, em vez de o eliminar em todo o lado. Os documentos do curso não são eliminados através da opção separada *eliminar documentos exclusivos* da interface de manutenção. Não interprete uma eliminação pela API como garantia de que todos os documentos são removidos fisicamente.

Se uma dependência ativa impedir a eliminação (por exemplo, uma sequência de recursos), o endpoint pode responder com `409 Conflict`. Reveja as dependências e as cópias de segurança do curso antes de enviar pedidos DELETE, especialmente em integrações em lote.

## Erros e notas operacionais

* Um chamador sem a função de administrador necessária é recusado; utilize uma conta corretamente autorizada em vez de uma credencial de professor para PATCH ou DELETE.
* Dados de pedido inválidos podem falhar a validação da entidade. Obtenha o curso atual antes de o atualizar parcialmente e envie apenas as propriedades que pretende alterar.
* Estas operações são expostas pelo API Platform; consulte a documentação OpenAPI da instância instalada para o esquema de resposta exato e os formatos de campo aceites.
* Teste a eliminação de cursos num curso descartável, não num curso que contenha registos de alunos de produção.

Para a administração de cursos na interface, consulte [Gerir cursos](../../admin-guide/courses/managing-courses.md). Para integrações de inscrição em sessões, consulte [Inscrição de estudantes na sessão](session-students.md).

**Implementação:** `src/CoreBundle/Entity/Course.php` (operações `Patch` e `Delete`) e `src/CoreBundle/State/CourseDeleteProcessor.php`. Adicionado no commit `8cc9d4b33d` do Chamilo LMS.