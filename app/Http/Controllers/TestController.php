<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte;
use App\Models\Scrapoffre;


class TestController extends Controller
{
    //


    public function index(){

        $nb_offres = 0;

        $nb_offres += $this->emploissenegal_com();
        $nb_offres += $this->emploisgabon();
        $nb_offres += $this->emploisci();
        $nb_offres += $this->emploiscg();
        $nb_offres += $this->emploiscm();
        
        return redirect()->route('admin.scrap_offre.index')->with('ok', "$nb_offres offre(s) scrappée(s)");
        // add btn convertirn en offre d'emploi, avec des champs prérmplis
        // $url = 'https://www.emploisenegal.com/offre-emploi-senegal/agent-nettoyage-661859';
        // $crawler = Goutte::request('GET', $url);
    
 
        // echo $crawler->filter('.title')->first()->text() . "<br>" ;
        // echo $crawler->filter('.job-ad-publication-date')->first()->text() . "<br> <hr>" ;


        // echo $crawler->filter('.job-ad-company-description')->html() . "<br>" ;

        // echo $crawler->filter('#job-ad-details-661859 > div > div')->html();

    }

    public function emploissenegal_com (){

        // trier par etudiants, jeunes diplo, debutants
        $url = 'https://www.emploisenegal.com/recherche-jobs-senegal/?f%5B0%5D=im_field_offre_niveau_experience%3A69&f%5B1%5D=im_field_offre_niveau_experience%3A68';
        $crawler = Goutte::request('GET', $url);
        
        $links = array();
        $links[] = $crawler->filter('.job-description-wrapper')->each(function($node) {
                return $node->filter('h5 > a')->extract(array('href'))[0] ;
        } );

        $nb_offres = 0;
        foreach ($links[0] as $link) {
           
            
            $url = 'https://www.emploisenegal.com'.$link;

            $crawler = Goutte::request('GET', $url);
    

            $ids = explode('-',$link);
            $id = $ids[sizeof($ids) - 1];

            try {
                $nom_entreprise = $crawler->filter('div.job-ad-company > div.company-title > a')->first()->text();


                $date_publication = $crawler->filter('.job-ad-publication-date')->first()->text() . "<br> <hr>" ;
                $description =$crawler->filter("#job-ad-details-$id > div > div")->html() ;
                $titre = $crawler->filter('.title')->first()->text();                



            } catch (\Throwable $th) {
              
                continue;
            }


            try {
                $logo = $crawler->filter('div.job-ad-company > div.company-logo > img')->extract(array('src'))[0];
            } catch (\Throwable $th) {
                $logo= ""; 
            }



             
            
            // $description = $crawler->filter('.job-ad-company-description')->html() . "<br>" .$crawler->filter("#job-ad-details-$id > div > div")->html() ;
            // $titre = $crawler->filter('.title')->first()->text();
            $annonce = $titre."<br>".$date_publication.$description ;
            $url = $url;
            $site = "emploisenegal.com";
            $pays = "Sénégal" ;
           
            // On vérifie si l'offre existe déjà

            $offre = Scrapoffre::where('url', $url)->first();


            if($offre == null){
  
                Scrapoffre::create([

                    
                    "titre" => $titre,
                    "annonce" => $annonce,
                    "url" => $url,
                    "site" => $site,
                    "pays" => $pays,
                    "nom_entreprise" => $nom_entreprise,
                    "logo_entreprise" => $logo,


                ]);

                $nb_offres++;
            }


        }


        return $nb_offres;
    }


    //  Emploi Gabon
    public function emploisgabon (){

        // trier par etudiants, jeunes diplo, debutants
        $url = 'https://www.emploi.ga/recherche-jobs-gabon/?f%5B0%5D=im_field_offre_niveau_experience%3A68&f%5B1%5D=im_field_offre_niveau_experience%3A69';
        $crawler = Goutte::request('GET', $url);
        
        $links = array();
        $links[] = $crawler->filter('.job-description-wrapper')->each(function($node) {
                return $node->filter('h5 > a')->extract(array('href'))[0] ;
        } );

       
     

        $nb_offres= 0;
        foreach ($links[0] as $link) {
           
            
            $url = 'https://www.emploi.ga/'.$link;

            $crawler = Goutte::request('GET', $url);


            // $id = preg_replace('/[^0-9.]+/', '', $link); 


            $ids = explode('-',$link);
            $id = $ids[sizeof($ids) - 1];

            try {
                $nom_entreprise = $crawler->filter('div.job-ad-company > div.company-title > a')->first()->text();


                $date_publication = $crawler->filter('.job-ad-publication-date')->first()->text() . "<br> <hr>" ;
                $description =$crawler->filter("#job-ad-details-$id > div > div")->html() ;
                $titre = $crawler->filter('.title')->first()->text();                



            } catch (\Throwable $th) {
              
                continue;
            }


            try {
                $logo = $crawler->filter('div.job-ad-company > div.company-logo > img')->extract(array('src'))[0];
            } catch (\Throwable $th) {
                $logo= ""; 
            }

            $annonce = $titre."<br>".$date_publication.$description ;
            $url = $url;
            $site = "emploi.ga";
            $pays = "Gabon" ;
            
            // On vérifie si l'offre existe déjà

            $offre = Scrapoffre::where('url', $url)->first();


            if($offre == null){

                Scrapoffre::create([
                    "titre" => $titre,
                    "annonce" => $annonce,
                    "url" => $url,
                    "site" => $site,
                    "pays" => $pays,
                    "nom_entreprise" => $nom_entreprise,
                    "logo_entreprise" => $logo,
    
                ]);
                $nb_offres++;

            }

        


        }

        return $nb_offres;

    }



    
    //  Emploi CI
    public function emploisci (){

        // trier par etudiants, jeunes diplo, debutants
        $url = 'https://www.emploi.ci/recherche-jobs-cote-ivoire/?f%5B0%5D=im_field_offre_niveau_experience%3A68&f%5B1%5D=im_field_offre_niveau_experience%3A69';
        $crawler = Goutte::request('GET', $url);
        
        $links = array();
        $links[] = $crawler->filter('.job-description-wrapper')->each(function($node) {
                return $node->filter('h5 > a')->extract(array('href'))[0] ;
        } );

        $nb_offres = 0;
        foreach ($links[0] as $link) {
           
            
            $url = 'https://www.emploi.ci/'.$link;

            $crawler = Goutte::request('GET', $url);


         
            $ids = explode('-',$link);
            $id = $ids[sizeof($ids) - 1];

            try {
                $nom_entreprise = $crawler->filter('div.job-ad-company > div.company-title > a')->first()->text();


                $date_publication = $crawler->filter('.job-ad-publication-date')->first()->text() . "<br> <hr>" ;
                $description =$crawler->filter("#job-ad-details-$id > div > div")->html() ;
                $titre = $crawler->filter('.title')->first()->text();                

            } catch (\Throwable $th) {
              
                continue;
            }
           
            try {
                $logo = $crawler->filter('div.job-ad-company > div.company-logo > img')->extract(array('src'))[0];
            } catch (\Throwable $th) {
                $logo= ""; 
            }
            
         
            $annonce = $titre."<br>".$date_publication.$description ;
            $url = $url;
            $site = "emploi.ci";
            $pays = "Côte d'ivoire" ;
          
     
             // On vérifie si l'offre existe déjà

            $offre = Scrapoffre::where('url', $url)->first();


            if($offre == null){
         
                Scrapoffre::create([

                    
                    "titre" => $titre,
                    "annonce" => $annonce,
                    "url" => $url,
                    "site" => $site,
                    "pays" => $pays,
                    "nom_entreprise" => $nom_entreprise,
                    "logo_entreprise" => $logo,


                ]);
                $nb_offres++;

            }

        }

        return $nb_offres;

    }



        
    //  Emploi congo
    public function emploiscg (){

        // trier par etudiants, jeunes diplo, debutants
        $url = 'https://www.emploi.cg/recherche-jobs-congo-brazzaville/?f%5B0%5D=im_field_offre_niveau_experience%3A68&f%5B1%5D=im_field_offre_niveau_experience%3A69';
        $crawler = Goutte::request('GET', $url);
        
        $links = array();
        $links[] = $crawler->filter('.job-description-wrapper')->each(function($node) {
                return $node->filter('h5 > a')->extract(array('href'))[0] ;
        } );

        $nb_offres=0;
        foreach ($links[0] as $link) {
           
            
            $url = 'https://www.emploi.cg/'.$link;

            $crawler = Goutte::request('GET', $url);


         
            $ids = explode('-',$link);
            $id = $ids[sizeof($ids) - 1];

            try {
                $nom_entreprise = $crawler->filter('div.job-ad-company > div.company-title > a')->first()->text();


                $date_publication = $crawler->filter('.job-ad-publication-date')->first()->text() . "<br> <hr>" ;
                $description =$crawler->filter("#job-ad-details-$id > div > div")->html() ;
                $titre = $crawler->filter('.title')->first()->text();                

            } catch (\Throwable $th) {
              
                continue;
            }
           
            try {
                $logo = $crawler->filter('div.job-ad-company > div.company-logo > img')->extract(array('src'))[0];
            } catch (\Throwable $th) {
                $logo= ""; 
            }
            
         
            $annonce = $titre."<br>".$date_publication.$description ;
            $url = $url;
            $site = "emploi.cg";
            $pays = "Congo" ;
          
     
             // On vérifie si l'offre existe déjà

            $offre = Scrapoffre::where('url', $url)->first();


            if($offre == null){
         
                Scrapoffre::create([
                    "titre" => $titre,
                    "annonce" => $annonce,
                    "url" => $url,
                    "site" => $site,
                    "pays" => $pays,
                    "nom_entreprise" => $nom_entreprise,
                    "logo_entreprise" => $logo,


                ]);
                $nb_offres;

            }

        }

        return $nb_offres;

    }


            
    //  Emploi cameroun
    public function emploiscm (){

        // trier par etudiants, jeunes diplo, debutants
        $url = 'https://www.emploi.cm/recherche-jobs-cameroun/?f%5B0%5D=im_field_offre_niveau_experience%3A69&f%5B1%5D=im_field_offre_niveau_experience%3A68';
        $crawler = Goutte::request('GET', $url);
        
        $links = array();
        $links[] = $crawler->filter('.job-description-wrapper')->each(function($node) {
                return $node->filter('h5 > a')->extract(array('href'))[0] ;
        } );

        $nb_offres=0;
        foreach ($links[0] as $link) {
           
            
            $url = 'https://www.emploi.cm'.$link;

            $crawler = Goutte::request('GET', $url);

         
            $ids = explode('-',$link);
            $id = $ids[sizeof($ids) - 1];

            try {
                $nom_entreprise = $crawler->filter('div.job-ad-company > div.company-title > a')->first()->text();

                $date_publication = $crawler->filter('.job-ad-publication-date')->first()->text() . "<br> <hr>" ;
                $description =$crawler->filter("#job-ad-details-$id > div > div")->html() ;
                $titre = $crawler->filter('.title')->first()->text();                

            } catch (\Throwable $th) {
              
                continue;
            }
           
            try {
                $logo = $crawler->filter('div.job-ad-company > div.company-logo > img')->extract(array('src'))[0];
            } catch (\Throwable $th) {
                $logo= ""; 
            }
            
         
            $annonce = $titre."<br>".$date_publication.$description ;
            $url = $url;
            $site = "emploi.cm";
            $pays = "Cameroun" ;
          
     
             // On vérifie si l'offre existe déjà

            $offre = Scrapoffre::where('url', $url)->first();


            if($offre == null){
         
                Scrapoffre::create([
                    "titre" => $titre,
                    "annonce" => $annonce,
                    "url" => $url,
                    "site" => $site,
                    "pays" => $pays,
                    "nom_entreprise" => $nom_entreprise,
                    "logo_entreprise" => $logo,


                ]);
                $nb_offres++;

            }

        }

        return $nb_offres;

    }



}
