<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch category IDs
        $categories = DB::table('categories')->pluck('id', 'name')->toArray();

        // Log the categories for debugging
        Log::info('Categories:', $categories);

        // List of services with category names
        $services = [
            // Skin Care Services
            ['name' => 'Deep Cleansing', 'category' => 'Skin Care', 'price' => 55, 'image' => Storage::url('public/skin.jpg'), 'description' => 'Includes removing impurities, blackheads, and cleaning pores.'],
            ['name' => 'Exfoliation', 'category' => 'Skin Care', 'price' => 55, 'image' => Storage::url('public/skin.jpg'), 'description' => 'Removes dead skin cells and renews the skin.'],
            ['name' => 'Therapeutic Masks', 'category' => 'Skin Care', 'price' => 55, 'image' => Storage::url('public/skin.jpg'), 'description' => 'Therapeutic masks for treating dry, oily, or sensitive skin.'],
            ['name' => 'Oxygen Therapy', 'category' => 'Skin Care', 'price' => 55, 'image' => Storage::url('public/skin.jpg'), 'description' => 'Boost skin radiance using oxygen.'],
            ['name' => 'Mesotherapy', 'category' => 'Skin Care', 'price' => 55, 'image' => Storage::url('public/skin.jpg'), 'description' => 'Non-surgical treatment to enhance skin glow and reduce wrinkles.'],

            // Hair Care Services
            ['name' => 'Haircut and Styling', 'category' => 'Hair Care', 'price' => 55, 'image' => Storage::url('public/hair.jpg'), 'description' => 'Cut and style hair according to preferences.'],
            ['name' => 'Hair Coloring', 'category' => 'Hair Care', 'price' => 55, 'image' => Storage::url('public/hair.jpg'), 'description' => 'Color hair using specialized dyes.'],
            ['name' => 'Protein and Keratin Treatment', 'category' => 'Hair Care', 'price' => 55, 'image' => Storage::url('public/hair.jpg'), 'description' => 'Treatment to smooth and nourish damaged hair.'],
            ['name' => 'Hair Smoothing', 'category' => 'Hair Care', 'price' => 55, 'image' => Storage::url('public/hair.jpg'), 'description' => 'Techniques to make hair smooth and straight.'],
            ['name' => 'Scalp Care', 'category' => 'Hair Care', 'price' => 55, 'image' => Storage::url('public/hair.jpg'), 'description' => 'Treat scalp issues like dryness or dandruff.'],

            // Makeup Services
            ['name' => 'Daily Makeup', 'category' => 'Makeup', 'price' => 55, 'image' => Storage::url('public/Makeup.jpg'), 'description' => 'Simple makeup for everyday activities.'],
            ['name' => 'Professional Makeup', 'category' => 'Makeup', 'price' => 55, 'image' => Storage::url('public/Makeup.jpg'), 'description' => 'Makeup for special events like weddings and parties.'],
            ['name' => 'Bridal Makeup', 'category' => 'Makeup', 'price' => 55, 'image' => Storage::url('public/Makeup.jpg'), 'description' => 'Special bridal makeup service for weddings.'],
            ['name' => 'Microblading', 'category' => 'Makeup', 'price' => 55, 'image' => Storage::url('public/Makeup.jpg'), 'description' => 'Temporary or permanent eyebrow or lip definition.'],

            // Nail Care Services
            ['name' => 'Manicure and Pedicure', 'category' => 'Nail Care', 'price' => 55, 'image' => Storage::url('public/nail.jpg'), 'description' => 'Care for hands and feet, including nail cleaning and polishing.'],
            ['name' => 'Nail Polish', 'category' => 'Nail Care', 'price' => 55, 'image' => Storage::url('public/nail.jpg'), 'description' => 'Coloring nails using different types of polish.'],
            ['name' => 'Acrylic or Gel Nails', 'category' => 'Nail Care', 'price' => 55, 'image' => Storage::url('public/nail.jpg'), 'description' => 'Applying and extending artificial nails.'],

            // Hair Removal Services
            ['name' => 'Waxing', 'category' => 'Hair Removal', 'price' => 55, 'image' => Storage::url('public/Hair Removal.jpg'), 'description' => 'Remove hair using hot or cold wax.'],
            ['name' => 'Laser Hair Removal', 'category' => 'Hair Removal', 'price' => 55, 'image' => Storage::url('public/Hair Removal.jpg'), 'description' => 'Permanent or semi-permanent hair removal using lasers.'],

            // Body Care Services
            ['name' => 'Massage', 'category' => 'Body Care', 'price' => 55, 'image' => Storage::url('public/body care.jpg'), 'description' => 'Different types of massage such as Swedish or therapeutic massage.'],
            ['name' => 'Steam Bath and Sauna', 'category' => 'Body Care', 'price' => 55, 'image' => Storage::url('public/body care.jpg'), 'description' => 'Enhance circulation and detoxify the body with steam and sauna.'],
            ['name' => 'Body Sculpting', 'category' => 'Body Care', 'price' => 55, 'image' => Storage::url('public/body care.jpg'), 'description' => 'Non-surgical procedures such as fat freezing to improve body shape.'],

            // Mesotherapy Services
            ['name' => 'Hair Mesotherapy', 'category' => 'Mesotherapy', 'price' => 55, 'image' => Storage::url('public/Mesotherapy.jpg'), 'description' => 'Stimulate hair growth and reduce hair loss.'],
            ['name' => 'Skin Mesotherapy', 'category' => 'Mesotherapy', 'price' => 55, 'image' => Storage::url('public/Mesotherapy.jpg'), 'description' => 'Brighten the skin and reduce pigmentation and aging signs.'],
            ['name' => 'Cellulite Reduction Mesotherapy', 'category' => 'Mesotherapy', 'price' => 55,'image' => Storage::url('public/Mesotherapy.jpg'), 'description' => 'Improve skin appearance and eliminate cellulite.'],

            // Cosmetic Injections
            ['name' => 'Filler Injections', 'category' => 'Cosmetic Injections', 'price' => 55, 'image' => Storage::url('public/Cosmetic.jpg'), 'description' => 'Fill in wrinkles and fine lines on the face.'],
            ['name' => 'Botox Injections', 'category' => 'Cosmetic Injections', 'price' => 55, 'image' => Storage::url('public/Cosmetic.jpg'), 'description' => 'Reduce the appearance of wrinkles and smoothen the skin.'],
            ['name' => 'PRP Injections', 'category' => 'Cosmetic Injections', 'price' => 55, 'image' => Storage::url('public/Cosmetic.jpg'), 'description' => 'Rejuvenate the skin using platelet-rich plasma.'],

            // Bridal Services
            ['name' => 'Bridal Package', 'category' => 'Bridal Services', 'price' => 55, 'image' => Storage::url('public/Bridal.jpg'), 'description' => 'Comprehensive services including skin, hair, makeup, and nails to prepare the bride for her wedding day.']
        ];

        // Convert category names to IDs
        foreach ($services as &$service) {
            if (isset($categories[$service['category']])) {
                $service['category_id'] = $categories[$service['category']];
                unset($service['category']);
            } else {
                Log::error('Category not found for service: ' . $service['name']);
                $service['category_id'] = null; // This will cause a NULL error if not handled
            }
        }

        // Remove any services with null category_id
        $services = array_filter($services, function ($service) {
            return $service['category_id'] !== null;
        });

        // Insert services into the database
        DB::table('services')->insert($services);
    }




}
