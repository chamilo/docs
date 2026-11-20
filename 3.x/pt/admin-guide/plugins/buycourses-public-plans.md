# Planos Públicos e Promocionais do BuyCourses

O plugin **BuyCourses** pode apresentar um plano gratuito público juntamente com cartões promocionais que direcionam para ofertas externas. Isto é independente do fluxo de compra de cursos/sessões pagos do plugin e da configuração de pagamento de serviços recorrentes.

## Configurar planos públicos

1. Abra a área de administração do BuyCourses e o respetivo editor de cartões de planos públicos.
2. No plano **Gratuito**, escolha se **Mostrar gratuito** está ativado.
3. Introduza o título, a descrição e a lista de funcionalidades traduzidos do plano gratuito, utilizando os separadores de idioma.
4. Adicione cartões promocionais conforme necessário. Configure o estado de ativação, a posição, o URL de destino, o URL opcional da imagem e o título, a descrição, as funcionalidades e o texto do botão traduzidos de cada cartão.
5. Guarde e, em seguida, utilize a ligação de pré-visualização/catálogo disponível para inspecionar a apresentação pública em cada idioma configurado.

O editor guarda o conteúdo traduzido para vários idiomas. Um cartão promocional é uma **ligação para uma oferta externa**, não uma prova de pagamento concluído nem uma subscrição automática no Chamilo.

## Limites de criação de cursos

O plano gratuito utiliza os limites padrão de criação de cursos da plataforma. O BuyCourses distingue as quotas padrão de cursos das quotas de cursos pagos. Quando está configurado um limite finito, a interface de criação de cursos pode mostrar a utilização e o progresso; os planos ilimitados não necessitam de um indicador percentual.

Teste os limites com uma conta que tenha apenas a quota padrão e com uma que tenha a quota paga aplicável. Um cartão promocional público nunca deve contornar as permissões de criação de cursos do lado do servidor.

## Comportamento de pagamento

Os cartões de planos públicos não substituem o BTCPay, o Stripe, o PayPal nem os fluxos estabelecidos de compra de cursos e de serviços recorrentes do plugin. Continue a gerir e a testar as gateways de pagamento na configuração existente do BuyCourses.

Consulte [BuyCourses: Pagamentos e Serviços Recorrentes](buycourses.md). Implementação: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).