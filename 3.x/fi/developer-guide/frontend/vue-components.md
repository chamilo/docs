# Vue-komponentit

Chamilolla on laaja joukko Vue-komponentteja, jotka on organisoitu ominaisuuskohtaisesti hakemistoon `assets/vue/components/`.

## Peruskomponentit

`Base*`-perhe hakemistossa `assets/vue/components/basecomponents/` käärii PrimeVue-primitiivit Chamilo-kohtaisilla oletuksilla (FloatLabel-asettelu, MDI-ikonit `chamiloIconToClass`-kautta, yhtenäiset validointiviestit, Tailwind-koot). Käytä aina `Base*`-komponenttia ennen kuin tuot sisään sen alla olevan PrimeVue-komponentin — näin käyttöliittymä pysyy yhtenäisenä koko SPA:ssa ja suunnittelumuutokset voidaan viedä käyttöön yhdestä paikasta.

Komponentteja **ei** rekisteröidä globaalisti (ainoa globaalisti rekisteröity PrimeVue-primitiivi on `Column`, jota käytetään `BaseTable`-komponentin sisällä). Tuo kukin komponentti eksplisiittisesti:

```js
import BaseButton from "@/components/basecomponents/BaseButton.vue"
import BaseDialog from "@/components/basecomponents/BaseDialog.vue"
```

### Lomakekentät

Useimmat vastaanottavat arvon `v-model`-sidonnalla, tarjoavat `id`- ja `label`-propsit saavutettavuutta ja kelluvaa otsikkoa varten sekä näyttävät validoinnin `isInvalid` / `errorText` (tai `messageText`) -parilla.

| Komponentti                      | Käärii                                                | Tarkoitus                                                                                                                                                                                          |
|----------------------------------|------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseInputText.vue`              | `InputText` + `FloatLabel`                           | Yksirivinen tekstikenttä. Vaihtaa staattiseen otsikkoon `date`/`time`/`datetime-local`-kentissä (joissa kelluva otsikko peittäisi natiivin paikkamerkin).                                          |
| `BaseInputTextWithVuelidate.vue` | `BaseInputText`                                      | Ohut Vuelidate-sovitin: välittää `$error`-arvon `isInvalid`-propsiin ja renderöi `$errors[].$message`-viestit `errors`-slotissa. Käytä yhdessä Vuelidate-kenttäobjektin kanssa.                     |
| `BaseTextArea.vue`               | `Textarea` + `FloatLabel`                            | Monirivinen tekstikenttä.                                                                                                                                                                          |
| `BaseTextAreaWithVuelidate.vue`  | `BaseTextArea`                                       | Sama Vuelidate-sovitinmalli kuin `BaseInputTextWithVuelidate`.                                                                                                                                     |
| `BaseInputNumber.vue`            | `InputNumber`                                        | Numeerinen kenttä `min` / `max` / `step` -arvoilla ja spinner-painikkeilla.                                                                                                                        |
| `BaseInputTags.vue`              | (custom)                                             | Vapaatekstiset tagisirut; tagit lisätään enterillä/pilkulla ja poistetaan backspacella.                                                                                                            |
| `BaseInputGroup.vue`             | `InputGroup` + `BaseButton`                          | Tekstikenttä yhdistettynä toimintopainikkeeseen (hakutyylinen).                                                                                                                                    |
| `BaseCheckbox.vue`               | `Checkbox`                                           | Binäärinen tai arvoon sidottu valintaruutu otsikolla.                                                                                                                                              |
| `BaseRadioButtons.vue`           | `RadioButton`                                        | Radiopainikkeiden ryhmä, jota ohjaa `options: [{label, value}]` -taulukko.                                                                                                                         |
| `BaseToggleButton.vue`           | `BaseButton`                                         | Kaksitilainen painike (päällä / pois -otsikot ja -kuvakkeet) sidottuna `v-model`-sidonnalla.                                                                                                       |
| `BaseCalendar.vue`               | `DatePicker` + `FloatLabel`                          | Päivämäärä- / päivämäärä-aika-valitsin. Noudattaa `platform.timepicker_increment`-asetusta ja käyttäjän kieliasetusta `calendarLocales`-kautta.                                                    |
| `BaseColorPicker.vue`            | native `<input type="color">` + `InputText`          | Väripaletti heksatekstivarmistuksella; käyttää `colorjs.io`-kirjastoa manuaalisen heksasyötteen validointiin.                                                                                      |
| `BaseRating.vue`                 | `Rating`                                             | Tähtiarviointikenttä.                                                                                                                                                                              |
| `BaseFileUpload.vue`             | native `<input type="file">` + `BaseButton`          | Yhden tiedoston valitsin, joka käynnistää liitetyylisen painikkeen.                                                                                                                                |
| `BaseFileUploadMultiple.vue`     | native `<input type="file" multiple>` + `BaseButton` | `BaseFileUpload`-komponentin monen tiedoston variantti.                                                                                                                                            |
| `BaseUploader.vue`               | Uppy `Dashboard`                                     | Täysi Uppy-lataaja (webkamera, ääni, kuvankäsittely, XHR-lataus), jonka kieliasetukset on kytketty nykyiseen `appLocale`-arvoon. Käytä tätä rikkaisiin latauksiin edistymisen kanssa; käytä `BaseFileUpload*`-komponentteja yksinkertaisiin liitteisiin. |

### Valinta ja automaattinen täydennys

| Component              | Wraps                        | Purpose                                                                                                                           |
|------------------------|------------------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| `BaseSelect.vue`       | `Dropdown` + `FloatLabel`    | Yhden valinnan avattava valikko, jossa on valinnainen tyhjennyspainike.                                                                                |
| `BaseMultiSelect.vue`  | `MultiSelect` + `FloatLabel` | Monivalinnan avattava valikko, joka näyttää valitut kohteet siruina.                                                                      |
| `BaseSearchSelect.vue` | `Dropdown` with `filter`     | Yhden valinnan avattava valikko sisäänrakennetulla hakukentällä, valinnainen virtuaalinen vieritys ja kaksirivinen vaihtoehtopohja (`label` + `sublabel`). |
| `BaseAutocomplete.vue` | `AutoComplete`               | Asynkroninen automaattinen täydennys (vähintään 3 merkkiä). Tukee yhtä tai useaa valintaa sekä `chip`-paikkaa sirujen mukauttamiseen.                  |
| `BaseUserFinder.vue`   | `BaseTable` + `userService`  | Sivutettu käyttäjähakutaulukko rivivalinnalla. Käytä, kun ominaisuus tarvitsee ylläpitäjätyylisen käyttäjävalitsimen.                           |

### Painikkeet ja toiminnot

| Component                        | Wraps               | Purpose                                                                                                                                                                                                                                                                                                                                                     |
|----------------------------------|---------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseButton.vue`                 | `Button` (PrimeVue) | Chamilon vakiopainike. Ratkaisee kuvakkeet `chamiloIconToClass`-funktion kautta, normalisoi `type`-arvon PrimeVuen `severity`/`variant`-arvoiksi ja renderöi sisäisen `BaseAppLink`-komponentin, kun `route` tai `toUrl` on annettu (siten sama komponentti käsittelee reititinlinkin, ankkurin ja tavallisen painikkeen tapaukset). Hyväksytyt `type`-arvot on lueteltu tiedostossa `validators.js` → `buttonTypeValidator`. |
| `BaseAdvancedSettingsButton.vue` | `BaseButton`        | Paljastuspainike, joka vaihtaa paikoitettua ”lisäasetukset”-paneelia `v-model`-sidonnalla.                                                                                                                                                                                                                                                                           |
| `BaseToolbar.vue`                | `Toolbar`           | Toimintotyökalupalkki `start`- / `end`-paikoilla (tai yhdellä oletuspaikalla). Valinnainen `showTopBorder` erottimen tyylittelyyn.                                                                                                                                                                                                                                       |

### Näyttö ja data

| Component            | Wraps                       | Purpose                                                                                                                                                                                         |
|----------------------|-----------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTable.vue`      | `DataTable` (PrimeVue)      | Chamilon vakio datataulukko. Tukee palvelinpuolen tilaa (`lazy`), monisarakkeista lajittelua, yleistä suodatinta, rivivalintaa ja sivutusta. Välitä sarakkeet `<Column>`-lapsina (rekisteröity globaalisti). |
| `BaseCard.vue`       | `Card`                      | Korttikääre, joka välittää `header`-, `title`-, `subtitle`-, `footer`- ja oletus- (sisältö) -slotit.                                                                                                |
| `BaseChart.vue`      | `Chart`                     | Piirakkakaavion esiasetus. Välitä Chart.js-yhteensopiva `data`-objekti.                                                                                                                                     |
| `BaseChip.vue`       | `Chip`                      | Chip, joka renderöidään `{value, labelField, imageField}`-objektista, valinnainen poistonappi.                                                                                                     |
| `BaseTag.vue`        | `Tag`                       | Väritetty tarratunniste. Kuvaa Chamilon `warning` PrimeVuen `warn`-arvoksi.                                                                                                                               |
| `BaseAvatarList.vue` | `Avatar` + `BaseUserAvatar` | Avatar-rivi ylivuotolaskurilla (esim. "+3"); ohjataan `useAvatarList`-composablesta.                                                                                                                        |
| `BaseUserAvatar.vue` | `Avatar`                    | Käyttäjäavatar kuvan varajärjestelmällä, lataustilalla ja saavutettavalla otsikolla.                                                                                                                           |
| `BaseIcon.vue`       | `<i class="mdi …">`         | Chamilon kuvakerenderöijä. Lisää valinnaisen merkin (teksti tai kuvake), työkaluvihjeen ja kokomuuntimen. Välitä aina Chamilon semanttinen nimi (esim. `"edit"`), ei raakaa MDI-luokkaa.                             |
| `BaseIconField.vue`  | `IconField` + `InputText`   | Hakukenttä, jossa on etummainen suurennuslasikuvake.                                                                                                                                                     |
| `BaseDivider.vue`    | `Divider`                   | Vaaka- tai pystysuuntainen erotin, valinnainen otsikko ja tasaus.                                                                                                                              |

### Navigointi ja valikot

| Component                  | Wraps                   | Purpose                                                                                                                                                                                 |
|----------------------------|-------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseMenu.vue`             | `Menu` (popup)          | Ponnahdusvalikko, joka ymmärtää reitittimen reitit `model[]`-kohteissa.                                                                                                                       |
| `BaseDropdownMenu.vue`     | (custom)                | Kevyt pudotusvalikon laukaisin, jossa on yhden auki olevan koordinointi (yhden avaaminen sulkee muut).                                                                                             |
| `BaseContextMenu.vue`      | (custom)                | Oikean napsautuksen / sijoitettu kontekstivalikko, jota ohjataan `visible`- ja `position`-ominaisuuksilla.                                                                                                            |
| `BaseSidebarPanelMenu.vue` | `PanelMenu`             | Haitarityylinen navigointivalikko sivupalkkeihin; seuraa automaattisesti laajennettuja avaimia mallista.                                                                                             |
| `BaseRouteTabs.vue`        | `BaseAppLink` row       | Välilehtipalkki, jossa kukin välilehti on reititinlinkki. Aktiivinen välilehti korostetaan automaattisesti nykyisen reitin perusteella.                                                                        |
| `BaseAppLink.vue`          | `RouterLink` *or* `<a>` | Älykäs linkki: renderöi `<a>`-elementin, kun `url` on asetettu (ulkoinen/vanha), muuten Vue Routerin `<RouterLink>`. Käytä tätä kummankin primitiivin sijaan, jotta sisäinen ja ulkoinen linkitys pysyy yhtenäisenä. |

### Dialogit

`BaseDialog` on perusta; muut koostetaan sen päälle yleisiä vahvista/peruuta- ja poistotyönkulkuja varten.

| Component                     | Wraps                     | Purpose                                                                                                                             |
|-------------------------------|---------------------------|-------------------------------------------------------------------------------------------------------------------------------------|
| `BaseDialog.vue`              | `Dialog`                  | Modaalidialogi, jossa on otsikoitu yläpalkki (valinnainen `headerIcon`) sekä slottina runko/alatunniste. Avoin tila on `defineModel("isVisible")`.      |
| `BaseDialogConfirmCancel.vue` | `BaseDialog`              | Vahvista/peruuta-modaali kahdella painikkeella. Konfiguroitava vahvistuksen `type` (vakavuus) ja `icon`; emittoi `confirmClicked` / `cancelClicked`. |
| `BaseDialogDelete.vue`        | `BaseDialogConfirmCancel` | Valmis ”Oletko varma, että haluat poistaa tämän kohteen?” -modaali vaaratyylisellä vahvistuspainikkeella.                                   |

### Editori ja rikassisältö

| Component            | Wraps                                           | Purpose                                                                                                                                                              |
|----------------------|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `BaseTinyEditor.vue` | TinyMCE (via the project's `components/Editor`) | Rikas tekstieditori, jossa on `FloatLabel`, tarkennus-/tyhjyystilan seuranta ja integrointi nykyiseen kurssikontekstiin (`cidReq`). Käytä sitä kaikille käyttäjän kirjoittamille HTML-kentille. |

### Apurit

| File              | Purpose                                                                                                                                                                                                                                                          |
|-------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `ChamiloIcons.js` | Kartoittaa semanttiset kuvakenimet (`edit`, `delete`, `eye-on`, `courses`, …) MDI CSS -luokkiin. Noin 127 merkintää. Selaa niitä osoitteessa `/admin/list-icons` käynnissä olevassa instanssissa.                                                                                                  |
| `validators.js`   | Jaetut prop-validaattorit: `iconValidator` (täytyy olla tunnettu Chamilo-kuvakenimi), `sizeValidator` (`normal` / `small` / `large`), `buttonTypeValidator` (sallitut `BaseButton`-tyypit). Tuo ne, kun määrittelet uusia `Base*`-komponentteja, jotka noudattavat näitä käytäntöjä. |

### Käytännöt Base-komponenteissa

* **v-model `defineModel()`:n kautta** — arvo (ja usein `isVisible`, `filters`, `selectedItems`) altistetaan malleina; välitä ne `v-model[:name]`-muodossa eikä `:prop` + `@update:prop`.
* **Kelluvat otsikot** — useimmat lomakekentät kietovat syötteen PrimeVue `FloatLabel variant="on"` -komponenttiin. Anna `label` (näytettävä teksti) ja `id` (käytetään `<label for>` -sidontaan).
* **Validointiviestit** — kentät altistavat `isInvalid`-tilan ja pienen viestin syötteen alla (`errorText`, `messageText` tai `smallText` komponentista riippuen). Yleisimmille on Vuelidate-tietoisia variantteja.
* **Kuvakkeet** — välitä Chamilon semanttisia nimiä, ei raakoja MDI-luokkia. Komponentit ratkaisevat ne `chamiloIconToClass`-kautta.
* **Koko** — `size="normal" | "small" | "large"` on tavanomainen kokoprop (ks. `sizeValidator`).
* **Koostaminen kopioinnin sijaan** — `BaseDialogDelete` kietoo `BaseDialogConfirmCancel`-komponentin, joka kietoo `BaseDialog`-komponentin; `BaseToggleButton` ja `BaseAdvancedSettingsButton` kietovat `BaseButton`-komponentin. Kun tarvitset olemassa olevan komponentin toistuvaa varianttia, koostaa mieluummin uusi `Base*` sen päälle sen sijaan, että toteuttaisit sen uudelleen ominaisuus-kansiossa.

## Asettelukomponentit

Sijainti: `components/layout/`:

| Component | Purpose |
|-----------|---------|
| `DashboardLayout.vue` | Pääasettelu: yläpalkki + sivupalkki + sisältöalue |
| `Sidebar.vue` | Vasen navigointipaneeli (tiivistettävä) |
| `TopbarLoggedIn.vue` | Yläpalkki logolla, saapuneet-kansiolla ja avatarilla |

## Ominaisuusalueiden komponentit

| Hakemisto | Komponentit | Tarkoitus |
|-----------|-----------|---------|
| `course/` | Kurssikortit, luettelon suodattimet, kurssilomakkeet | Kurssien listaus ja hallinta |
| `session/` | Istuntokortit, luettelo | Istuntojen listaus |
| `assignments/` | Palautuslistat, arviointimodalsit, lomakkeet | Tehtävätyönkulku |
| `chat/` | DockedChat, chat-viestit | Reaaliaikainen chat ja tekoälytutori |
| `filemanager/` | CourseDocuments, PersonalFiles | Tiedostoselain ja hallinta |
| `installer/` | Step1-Step7, EmailSettings | Asennusvelho |
| `social/` | GroupInfoCard, sosiaalisen verkoston julkaisut | Sosiaalisen verkoston ominaisuudet |
| `attendance/` | AttendanceTable | Läsnäolon seuranta |
| `usergroup/` | GroupMembers | Käyttäjäryhmien hallinta |

## Ikonijärjestelmä

Ikonit käyttävät **Material Design Icons (MDI)** -kirjastoa ainoana ikonikirjastona: `<i class="mdi mdi-pencil"></i>`

Tiedosto `ChamiloIcons.js` tarjoaa semanttisen kartoituksen:

```javascript
export const chamiloIconToClass = {
  "edit": "mdi mdi-pencil",
  "delete": "mdi mdi-delete",
  "eye-on": "mdi mdi-eye",
  "courses": "mdi mdi-book-open-page-variant",
  // ... 127 mappings
}
```

Komponentit käyttävät `BaseIcon`-komponenttia tai viittaavat `chamiloIconToClass`-kartoitukseen ikonien yhtenäiseen renderöintiin.

Selattava viite kaikista alustalla käytettävissä olevista ikoneista löytyy osoitteesta `/admin/list-icons` missä tahansa käynnissä olevassa Chamilo-instanssissa.

## Komponenttien mallit

* **Composition API** — Komponentit käyttävät Vue 3:n `<script setup>` -syntaksia
* **PrimeVue-integraatio** — Laaja PrimeVue-komponenttien käyttö (Button, DataTable, Dialog, Menu jne.)
* **Axios API-kutsuille** — HTTP-pyynnöt taustajärjestelmän API:in
* **Vue I18n** — Kaikki käyttäjälle näkyvä teksti käyttää käännösavaimia