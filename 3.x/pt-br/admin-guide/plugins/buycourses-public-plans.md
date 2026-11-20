# Planos públicos e promocionais do BuyCourses

O plugin **BuyCourses** pode exibir um plano gratuito público juntamente com cartões promocionais que direcionam a ofertas externas. Isso é independente do fluxo de compra de cursos/sessões pagos do plugin e da configuração de pagamento de serviços recorrentes.

## Configurar planos públicos

1. Abra a área de administração do BuyCourses e o editor de cartões de planos públicos.
2. No plano **Gratuito**, escolha se **Exibir gratuito** está habilitado.
3. Informe o título, a descrição e a lista de recursos traduzidos do plano gratuito usando as abas de idioma.
4. Adicione cartões promocionais conforme necessário. Configure o estado de habilitação, a posição, a URL de destino, a URL opcional da imagem e o título, a descrição, os recursos e o texto do botão traduzidos de cada cartão.
5. Salve e, em seguida, use o link de visualização/catálogo disponível para inspecionar a apresentação pública em cada idioma configurado.

O editor salva o conteúdo traduzido para vários idiomas. Um cartão promocional é um **link para uma oferta externa**, não a comprovação de um pagamento concluído nem uma assinatura automática no Chamilo.

## Limites de criação de cursos

O plano gratuito utiliza os limites padrão de criação de cursos da plataforma. O BuyCourses distingue cotas padrão de cursos de cotas pagas de cursos. Quando um limite finito está configurado, a interface de criação de cursos pode exibir o uso e o progresso; planos ilimitados não precisam de um indicador percentual.

Teste os limites com uma conta que tenha apenas a cota padrão e com outra que tenha a cota paga aplicável. Um cartão promocional público nunca deve contornar as permissões de criação de cursos no servidor.

## Comportamento de pagamento

Os cartões de planos públicos não substituem o BTCPay, o Stripe, o PayPal nem os fluxos estabelecidos de compra de cursos e de serviços recorrentes do plugin. Continue a gerenciar e testar os gateways de pagamento na configuração existente do BuyCourses.

Consulte [BuyCourses: Pagamentos e serviços recorrentes](buycourses.md). Implementação: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).