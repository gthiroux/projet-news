<?php

namespace App\DataFixtures;

use App\Entity\Actu;
use App\Entity\Event;
use App\Entity\Funcfact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadActus($manager);
        $this->loadEvents($manager);
        $this->loadFuncfacts($manager);

        $manager->flush();
    }

    private function loadActus(ObjectManager $manager): void
    {
        $actus = [
            [
                'date'        => new \DateTime('2025-03-10'),
                'title'       => 'Ouverture des inscriptions 2025',
                'description' => 'Les inscriptions pour la nouvelle saison sont désormais ouvertes. Rendez-vous sur notre site pour vous inscrire dès maintenant.',
            ],
            [
                'date'        => new \DateTime('2025-04-05'),
                'title'       => 'Nouveau cours de yoga disponible',
                'description' => 'Un nouveau cours de yoga pour débutants est disponible tous les mardis à 18h. Places limitées, inscrivez-vous vite !',
            ],
            [
                'date'        => new \DateTime('2025-05-20'),
                'title'       => 'Fermeture exceptionnelle',
                'description' => 'Le centre sera fermé exceptionnellement le 1er mai à l\'occasion de la fête du travail. Reprise normale le 2 mai.',
            ],
            [
                'date'        => new \DateTime('2025-06-15'),
                'title'       => 'Stage d\'été : inscriptions ouvertes',
                'description' => 'Notre stage d\'été aura lieu du 7 au 18 juillet. Programme intensif pour tous les niveaux. Plus d\'infos sur demande.',
            ],
            [
                'date'        => null,
                'title'       => 'Bienvenue sur notre site !',
                'description' => 'Découvrez toutes nos activités et nos cours. N\'hésitez pas à nous contacter pour toute question.',
            ],
        ];

        foreach ($actus as $data) {
            $actu = new Actu();
            $actu->setDate($data['date']);
            $actu->setTitle($data['title']);
            $actu->setDescription($data['description']);
            $manager->persist($actu);
        }
    }

    private function loadEvents(ObjectManager $manager): void
    {
        $events = [
            [
                'name'      => 'Python avancé',
                'teacher'   => 'Sophie Martin',
                'classroom' => 'Salle A',
                'level'     => 'B2',
                'date'      => new \DateTime('today'),
                'start'     => new \DateTime('09:00'),
                'finish'    => new \DateTime('10:00'),
            ],
            [
                'name'      => 'Blender',
                'teacher'   => 'Thomas Durand',
                'classroom' => 'Salle B',
                'level'     => 'B2',
                'date'      => new \DateTime('today'),
                'start'     => new \DateTime('10:30'),
                'finish'    => new \DateTime('12:00'),
            ],
            [
                'name'      => 'UX UI',
                'teacher'   => 'Clara Leroy',
                'classroom' => 'Grand Studio',
                'level'     => 'B1',
                'date'      => new \DateTime('today'),
                'start'     => new \DateTime('14:00'),
                'finish'    => new \DateTime('15:30'),
            ],
            [
                'name'      => 'Data',
                'teacher'   => 'Marc Petit',
                'classroom' => 'Salle C',
                'level'     => 'B3',
                'date'      => new \DateTime('2025-04-17'),
                'start'     => new \DateTime('18:00'),
                'finish'    => new \DateTime('19:00'),
            ],
            [
                'name'      => 'Symfony',
                'teacher'   => 'Sophie Martin',
                'classroom' => 'Salle Zen',
                'level'     => 'B2',
                'date'      => new \DateTime('today +1 day'),
                'start'     => new \DateTime('08:00'),
                'finish'    => new \DateTime('09:00'),
            ],
            [
                'name'      => 'Maths',
                'teacher'   => 'Thomas Durand',
                'classroom' => 'Salle A',
                'level'     => 'B1',
                'date'      => new \DateTime('today'),
                'start'     => new \DateTime('11:00'),
                'finish'    => new \DateTime('12:30'),
            ],
        ];

        foreach ($events as $data) {
            $event = new Event();
            $event->setName($data['name']);
            $event->setTeacher($data['teacher']);
            $event->setClassroom($data['classroom']);
            $event->setLevel($data['level']);
            $event->setDate($data['date']);
            $event->setStart($data['start']);
            $event->setFinish($data['finish']);
            $manager->persist($event);
        }
    }

    private function loadFuncfacts(ObjectManager $manager): void
    {
        $funcfacts = [
            [
                'title'       => 'Le saviez-vous ?',
                'description' => 'Pratiquer 30 minutes de sport par jour réduit de 35 % le risque de maladies cardiovasculaires.',
            ],
            [
                'title'       => 'Le corps humain',
                'description' => 'Nos muscles représentent environ 40 % du poids total du corps. Un corps bien entraîné brûle plus de calories, même au repos !',
            ],
            [
                'title'       => 'Hydratation',
                'description' => 'Le corps humain est composé à 60 % d\'eau. Il est essentiel de boire au moins 1,5 litre d\'eau par jour, et davantage lors d\'une activité physique.',
            ],
            [
                'title'       => 'Le yoga en chiffres',
                'description' => 'Le yoga est pratiqué par plus de 300 millions de personnes dans le monde. Originaire de l\'Inde il y a plus de 5 000 ans, il est aujourd\'hui reconnu comme une thérapie complémentaire par l\'OMS.',
            ],
            [
                'title'       => 'Bienfaits du Pilates',
                'description' => 'Le Pilates a été inventé par Joseph Pilates dans les années 1920. Cette méthode améliore la posture, renforce les muscles profonds et soulage les douleurs dorsales.',
            ],
        ];

        foreach ($funcfacts as $data) {
            $funcfact = new Funcfact();
            $funcfact->setTitle($data['title']);
            $funcfact->setDescription($data['description']);
            $manager->persist($funcfact);
        }
    }
}