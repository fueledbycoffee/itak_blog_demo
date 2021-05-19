<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\User;
use App\Entity\Article;
use Faker;
use \joshtronic\LoremIpsum;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $faker = Faker\Factory::create();
        // $lipsum = new \joshtronic\LoremIpsum();
        $users = [];

        $user = new User();
        $user->setUsername("admin");
        $user->setFirstName("Admin");
        $user->setLastName("Istrator");
        $user->setEmail("admin@changeme.plz");
        $user->setPassword("admin");
        $user->setCreatedAt(new DateTime());
        $manager->persist($user);

        // for ($i = 0; $i < 1; $i++) {
        //     $user = new User();
        //     $user->setUsername($faker->name);
        //     $user->setFirstName($faker->firstName());
        //     $user->setLastName($faker->lastName());
        //     $user->setEmail($faker->email);
        //     $user->setPassword($faker->password());
        //     $user->setCreatedAt(new DateTime());
        //     $manager->persist($user);
        //     $users[] = $user;
        // }

        // $categories = [];
        // for ($i = 0; $i < 15; $i++) {
        $category = new Category();
        $category->setTitle("Demo Category");
        $category->setDescription("I'm just a demo category");
        $manager->persist($category);
        //     $categories[] = $category;
        // }

        // $articles = [];

        // for($i=0; $i < 100;$i++) {
        $article = new Article();
        $article->setTitle("Hello World !");
        $article->setContent("I'm your first article on your blog");
        $article->setImage("https://comoncreation.fr/wp-content/uploads/2020/01/0_4ty0Adbdg4dsVBo3.png");
        $article->setCreatedAt(new DateTime());

        $article->setAuthor($user);
        $article->addCategory($category);
        $manager->persist($article);
        //     $articles[] = $article;
        // }

        $manager->flush();
    }
}
