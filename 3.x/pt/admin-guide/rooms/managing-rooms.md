# Gestão de Salas

As salas no Chamilo estão organizadas sob filiais: uma filial é um local físico, e cada sala pertence a exatamente uma filial.

## Filiais

**Salas > Filiais** gere os locais físicos da sua organização — um edifício, campus ou escritório. As filiais podem ser aninhadas (uma filial pode ter filiais filhas), pelo que pode modelar algo como "Campus Principal > Edifício A."

Campos que pode definir para uma filial:

* **Título** e **Descrição**
* **Filial superior** — Para organizar as filiais de forma hierárquica
* **Endereço IP** — Opcional, para identificação baseada na rede
* **Latitude / Longitude** — Para cartografia
* **Velocidade de transferência / Velocidade de envio** e **Atraso** — Metadados opcionais de qualidade de rede
* **E-mail, nome e telefone do administrador** — Dados de contacto de quem gere esse local

## Salas

**Salas > Salas** gere os espaços efetivamente reserváveis dentro de uma filial — tipicamente uma sala de aula ou de formação. Cada sala deve pertencer a uma filial.

Campos que pode definir para uma sala:

* **Título** e **Descrição**
* **Filial** — A que filial esta sala pertence (obrigatório)
* **Número do piso**
* **Capacidade** — Deve ser um número positivo
* **Geolocalização**, **Endereço IP** e **Máscara IP** — Campos avançados opcionais

Cada sala tem também uma vista de calendário de "Ocupação" que mostra as suas reservas, e uma contagem dos cursos que a utilizam.

## Relacionado

Para encontrar uma sala livre para um intervalo horário específico em vez de percorrer a lista, consulte [Localizador de Disponibilidade de Salas](room-availability-finder.md).