<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Specialization;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\text;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 10; $i++) {

            $specializations_ids = Specialization::pluck('id')->toArray();

            $doctor = new Doctor();
            $doctor->user_id = $i + 1;
            $doctor->profile_photo = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
            $doctor->cv = false;
            $doctor->phone_number = $faker->numberBetween(1000000000, 9999999999);
            $doctor->address = "Piazza la bomba, 5 00011 Roma";
            $doctor->performances = "Ecografia testicolare base e eco colordoppler • 200 €";
            $doctor->description = "Mi occupo di questioni andrologiche da oltre 20 anni, sempre incontrando il paziente con una visione d'insieme e complessiva come anche ormai suggerisce tutta la scienza andrologica.
            Nella stragrande maggioranza dei casi ogni 'sintomo andrologico' è connesso a condizioni più generali e quindi il mio compito è inquadrarlo nel complesso della situazione dell'organismo e dello stile di vita.
            Per tali ragioni ogni visita richiede un tempo medio-lungo in cui il colloquio ha un ruolo fondamentale.
            I dati delle analisi di laboratorio vengono sempre valutati nelle loro relazioni, fatto che consente una migliore loro interpretazione, soprattutto per il profilo endocrino, metabolico-ossidativo, spermatico.
        Le valutazioni clinico-strumentali vengono tutte eseguite presso lo Studio, così come gli interventi in anestesia locale.";
            $doctor->save();

            $doctor_specializations = [];
            foreach ($specializations_ids as $specialization) {
                if (rand(0, 1)) $doctor_specializations[] = $specialization;
            }
            $doctor->specializations()->attach($doctor_specializations);
        }
        $doctors = Doctor::all();
        $ratings = Rating::all();

        // Create an array to keep track of attached ratings for this doctor.
        $attachedRatings = [];

        foreach ($doctors as $doctor) {
            // Randomly determine the number of ratings to attach to this doctor.
            $numberOfRatings = rand(1, 10); // You can adjust the range as needed.

            // Shuffle the ratings collection for this doctor.
            $shuffledRatings = $ratings->shuffle();

            // Attach the specified number of ratings to the doctor.
            for ($i = 0; $i < $numberOfRatings; $i++) {
                $randomRating = $shuffledRatings->pop();

                // Check if the rating has already been attached to another doctor.
                while (in_array($randomRating->id, $attachedRatings)) {
                    $randomRating = $shuffledRatings->pop();
                }

                // Attach the rating to the doctor and add it to the list of attached ratings.
                $doctor->ratings()->attach($randomRating->id);
                $attachedRatings[] = $randomRating->id;
            }
        }
    }
}
