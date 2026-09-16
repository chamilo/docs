# Gestion des salles

Les salles dans Chamilo sont organisées sous des sites : un site est un lieu physique, et chaque salle appartient à exactement un site.

## Sites

**Salles > Sites** gère les sites physiques de votre organisation — un bâtiment, un campus ou un bureau. Les sites peuvent être imbriqués (un site peut avoir des sites enfants), de sorte que vous pouvez modéliser quelque chose comme « Campus principal > Bâtiment A ».

Champs que vous pouvez définir pour un site :

* **Titre** et **Description**
* **Site parent** — Pour organiser les sites de manière hiérarchique
* **Adresse IP** — Facultatif, pour une identification basée sur le réseau
* **Latitude / Longitude** — Pour la cartographie
* **Vitesse de téléchargement / envoi** et **Délai** — Métadonnées facultatives sur la qualité du réseau
* **E-mail, nom et téléphone de l'administrateur** — Coordonnées de la personne qui gère ce site

## Salles

**Salles > Salles** gère les espaces réellement réservables au sein d'un site — généralement une salle de classe ou une salle de formation. Chaque salle doit appartenir à un site.

Champs que vous pouvez définir pour une salle :

* **Titre** et **Description**
* **Site** — Le site auquel cette salle appartient (obligatoire)
* **Numéro d'étage**
* **Capacité** — Doit être un nombre positif
* **Géolocalisation**, **Adresse IP** et **Masque IP** — Champs avancés facultatifs

Chaque salle dispose également d'une vue calendrier « Occupation » montrant ses réservations, ainsi que d'un décompte des cours qui l'utilisent.

## Voir aussi

Pour trouver une salle libre pour un créneau horaire donné plutôt que de parcourir la liste, consultez [Recherche de disponibilité des salles](room-availability-finder.md).