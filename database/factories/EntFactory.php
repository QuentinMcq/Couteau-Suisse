<?php

namespace Database\Factories;

use App\Models\Ent;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $values = [
            'Mon dossier' => '#',
            'Alert SMS' => '#',
            'Actualité et documents' => '#',
            'Offres d\'emploi de l\'université' => 'https://ent.univ-artois.fr/esup-news/feeds/pub/item?c=1&itemID=34',
            'Career Center' => 'https://univ-artois.jobteaser.com/fr/users/sso_activation',
            'Contrat Pédagogique' => 'http://conpere.univ-artois.fr/etudiants/accueil',
            'Convention de stage' => 'http://pstagev2.univ-artois.fr/esup-pstage/stylesheets/stage/welcome.xhtml;jsessionid=4ACEDAF24617B6ADFCC0D11E2D67D7EC',
            'Transferts-départs' => 'https://esup-transferts.univ-artois.fr/esup-transferts/stylesheets/depart/welcome.xhtml?ticket=ST-5592-9gScmVLfJSOsJsrAOK91-auth.univ-artois.fr',
            'Inscription au TOEIC' => 'http://www.univ-artois.fr/inscription-au-toeic',
            'IA Web' => 'http://www.univ-artois.fr/formations/admission-inscription-transfert/reinscription',
            'IP Web' => 'http://www.univ-artois.fr/inscription-pedagogique',
            'Inscription au CLES' => 'http://www.univ-artois.fr/inscription-au-cles',
            'Moodle' => 'https://moodle.univ-artois.fr/cours/',
            'Maison des langues' => 'http://www.univ-artois.fr/formations/la-maison-des-langues',
            'CLES' => 'http://www.univ-artois.fr/formations/certifications/cles',
            'Ressources pédagogiques' => 'http://www.sup-numerique.gouv.fr/',
            'CoVoit\'Artois' => 'http://covoiturage.univ-artois.fr/covoiturage/mon-compte',
            'Inscriptions Activités Sportives' => 'https://atlas.univ-artois.fr/atlas_etu/mes_inscriptions.php',
            'Tutoriels' => 'http://esupweb.univ-artois.fr/esup/tutos/etudiant/co/00a_guideWeb.html',
            'Mon webmail' => 'https://wmailetu.univ-artois.fr/',
            'Annuaire' => '#',
            'Changement de mot de passe' => 'https://monmotdepasse.univ-artois.fr/',
            'Listes de diffusion' => 'http://weblistes.univ-artois.fr/sympa/?ticket=ST-5314-fyHW7YtHOI0cVkVw6txr-auth.univ-artois.fr',
            'Zoom' => 'http://esupweb.univ-artois.fr/esup/pages/zoom/',
            'Intranet' => 'http://intranet.univ-artois.fr/etudiant',
            'Encyclopaedia Universalis' => 'http://www.universalis-edu.com/?sso_id=24&ticket=ST-4849-YFtj0HYKjJmlf7OEDvGX-auth.univ-artois.fr',
            'Bibliothèques' => 'http://portail-bu.univ-artois.fr/medias/medias.aspx?INSTANCE=exploitation&SSO_FORCELOGON=TRUE&PORTAL_ID=general_portal.xml',
            'UNT' => 'http://univ-numerique.fr/'
        ];

        foreach ($values as $key => $value) {
            Ent::create([
                'title' => $key,
                'link' => $value
            ]);
        }

        return [];
    }
}
