# Monitoramento de Exercícios

O Monitoramento de Exercícios <img src="../../.gitbook/assets/icons/mdi-camera.svg" alt="Monitoramento de Exercícios" data-size="line"> usa a webcam do aluno para capturar fotos de identidade durante uma tentativa de teste — uma foto de um documento de identificação e uma foto do rosto do aluno — para fins de integridade do exame.

## Sinalizando um Teste

Abra as configurações do teste e marque a opção **Exercise Monitoring**. Uma vez sinalizado, os alunos que tentarem esse teste veem um pequeno widget flutuante de webcam e são solicitados a capturar as duas fotos antes ou durante a tentativa.

## Revisando as Capturas

[inferred] As fotos capturadas são revisadas por meio da tela de relatórios adicionada pelo plugin **[Exercise Focused](exercise-focused.md)**, que foi desenvolvido em conjunto com este plugin — se a sua plataforma tiver apenas o Exercise Monitoring habilitado e não o Exercise Focused, pergunte ao administrador como as fotos capturadas devem ser revisadas na sua instalação.

## Pontos a Saber

* **Isto trata de dados pessoais sensíveis** — fotos de documentos de identificação são uma categoria de dados que muitas instituições e regulamentações de privacidade tratam com cuidado extra. Confirme com o administrador se o uso deste plugin está de acordo com as obrigações de proteção de dados da sua instituição antes de depender dele
* **As fotos são retidas temporariamente** — O administrador define um período de retenção, após o qual as fotos capturadas são automaticamente excluídas
* **Este é um recurso em estágio inicial** — Espere arestas; verifique se o fluxo de captura funciona conforme o esperado em uma execução de teste antes de usá-lo em um exame real