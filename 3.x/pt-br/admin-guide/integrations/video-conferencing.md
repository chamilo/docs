# Videoconferência

O Chamilo integra-se a plataformas de videoconferência para viabilizar sessões ao vivo dentro dos cursos.

## Plataformas suportadas

### BigBlueButton

O **BigBlueButton** (BBB) é um sistema de webconferência de código aberto projetado para a aprendizagem online. É a solução de videoconferência mais comumente utilizada com o Chamilo.

#### Configuração

1. Instale o BigBlueButton em um servidor separado (consulte a [documentação do BigBlueButton](https://docs.bigbluebutton.org/))
2. Use bbb-conf --salt no servidor BBB para obter os detalhes de integração
3. Nas configurações da plataforma Chamilo, **Plugins**, instale o plugin Videoconference e informe a configuração para definir:
   * **BBB server URL** — O endereço do seu servidor BBB
   * **BBB salt/secret** — O segredo da API do seu servidor BBB
4. Salve
5. **Ative** o plugin Videoconference
6. Alguns recursos especiais estão disponíveis para administradores; portanto, certifique-se de habilitá-lo na região *admin_page*

#### Recursos disponíveis no Chamilo

* Iniciar/entrar em reuniões a partir de um curso
* Criação automática de sala por curso
* Gravações de reuniões (se habilitadas)
* Compartilhamento de tela, quadro branco, salas de grupo
* Chat juntamente com o vídeo

### Zoom

O Chamilo também pode integrar-se ao **Zoom** para videoconferência.

#### Configuração

1. Crie um aplicativo Zoom no Zoom Marketplace
2. No Chamilo, configure as credenciais da API do Zoom
3. Ative a integração com o Zoom

#### Como funciona

Quando o Zoom está configurado, os professores podem criar e iniciar reuniões Zoom a partir do curso. Os alunos entram pela interface do Chamilo.

## Escolha entre BBB e Zoom

| Recurso | BigBlueButton | Zoom |
|---------|--------------|------|
| Custo | Gratuito (código aberto), mas exige servidor próprio | Exige assinatura do Zoom |
| Hospedagem | Autohospedado | Hospedado na nuvem pelo Zoom |
| Profundidade da integração | Profunda (feita para uso em LMS) | Padrão |
| Gravação | No servidor, armazenada na sua infraestrutura | Nuvem do Zoom ou local |
| Quadro branco | Integrado | Integrado |
| Salas de grupo | Sim | Sim |

## Dicas

* **Servidor separado para o BBB** — O BigBlueButton deve ser executado em um servidor dedicado próprio para melhor desempenho, e não no mesmo servidor do Chamilo
* **Teste antes das aulas** — Sempre teste a configuração de videoconferência antes de uma sessão ao vivo
* **Verifique a largura de banda** — Certifique-se de que o servidor e a rede suportam o número esperado de usuários simultâneos