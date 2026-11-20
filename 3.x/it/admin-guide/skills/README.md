# Competenze

Il blocco **Skills** nella dashboard di amministrazione raggruppa gli strumenti per definire, organizzare e tracciare i badge di competenza («skills») sull'intera piattaforma. Una competenza può essere assegnata automaticamente quando un discente raggiunge una soglia nel gradebook, completa corsi specifici, oppure manualmente da un docente, e può includere un'icona in stile badge e un livello (ad esempio Bronzo/Argento/Oro).

![Il blocco Skills nella dashboard di amministrazione, con Skills wheel, Skills import, Manage skills, Manage skills levels, Skills ranking e Skills and assessments](/.gitbook/assets/admin-skills-block.png)

L'intero blocco compare solo se l'impostazione **Enable skills tool** (`skill.allow_skills_tool`, in Configuration Settings > Skills) è attivata — è abilitata per impostazione predefinita.

## Accesso al blocco Skills

Dal pannello di amministrazione, il blocco **Skills** compare accanto agli altri blocchi della dashboard. Fare clic su uno dei suoi collegamenti per aprire lo strumento corrispondente.

## Contenuto del blocco

* **[Gestione delle competenze](managing-skills.md)** — Creare competenze, importarle in blocco e assegnare ciascuna a una scala di livelli
* **[Ruota delle competenze](skills-wheel.md)** — Una mappa visiva ingrandibile dell'intero albero delle competenze
* **[Classifica delle competenze](skills-ranking.md)** — Una classifica degli utenti in base alle competenze acquisite
* **[Competenze e valutazioni](skills-assessments.md)** — Collegare le categorie del gradebook alle competenze che assegnano

## Impostazioni correlate

Alcune altre impostazioni in Configuration Settings > Skills modificano chi può fare cosa con questo blocco:

* **Allow HR skills management** (`allow_hr_skills_management`) — Consente agli utenti Human Resources Manager di gestire le competenze insieme agli amministratori
* **Allow private skills** (`allow_private_skills`)
* **Teachers can assign skills** (`skills_teachers_can_assign_skills`)
* **Hide skill levels** (`hide_skill_levels`)
* **Show full skill name on skill wheel** (`show_full_skill_name_on_skill_wheel`)