<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Массив с разметками Google Maps
        $googleMapsHtmlArray = [
            // Вставки с картами Google Maps
            // Каждая вставка представляет собой карту Google Maps с разными координатами
            // и отображается в виде iframe с указанными параметрами
            '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d28116127.53921884!2d-133.2189594532239!3d-14.022071676124249!3m2!1i1024!2i768!4f13.1!5e1!3m2!1suk!2sde!4v1696440224056!5m2!1suk!2sde" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1318.0904718089582!2d-51.544770813860794!3d63.69830350607435!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ea188972eaaaaab%3A0x8be21ba783156b15!2sKangerluarsoruseq!5e1!3m2!1suk!2sde!4v1696440342124!5m2!1suk!2sde" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15104.512081503346!2d52.95804937314477!3d40.99261418783585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x402d586779ea94f5%3A0x752cbb00becfc191!2zU2FyeWRlcGUsINCi0YPRgNC60LzQtdC90ZbRgdGC0LDQvQ!5e1!3m2!1suk!2sde!4v1696440474877!5m2!1suk!2sde" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56768.84028268903!2d-68.83017879951261!3d44.829722866420404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cae4b46101129bd%3A0x4d0918b0a7af7677!2z0JHQsNC90LPQvtGALCDQnNC10L0gMDQ0MDEsINCh0L_QvtC70YPRh9C10L3RliDQqNGC0LDRgtC4INCQ0LzQtdGA0LjQutC4!5e1!3m2!1suk!2sde!4v1696441120070!5m2!1suk!2sde" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115804.3477050136!2d-70.29391502845873!3d43.667105033729584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cb29c72aab0ee2d%3A0x7e9db6b53372fa29!2z0J_QvtGA0YLQu9C10L3QtCwg0JzQtdC9LCDQodC_0L7Qu9GD0YfQtdC90ZYg0KjRgtCw0YLQuCDQkNC80LXRgNC40LrQuA!5e1!3m2!1suk!2sde!4v1696441145693!5m2!1suk!2sde" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63715.34991294759!2d-115.84520662151043!3d37.251432634309374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80b81baaba3e8c81%3A0x970427e38e6237ae!2z0JfQvtC90LAgNTEsINCd0LXQstCw0LTQsCwg0KHQv9C-0LvRg9GH0LXQvdGWINCo0YLQsNGC0Lgg0JDQvNC10YDQuNC60Lg!5e1!3m2!1suk!2sde!4v1696441178134!5m2!1suk!2sde" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ];
        return [
            // Генерация случайного имени отделения
            'name'=>fake()->realText(fake()->numberBetween(10, 20)),
            // Генерация случайного адреса
            'address'=>fake()->address(),
            // Выбор случайной вставки с картой Google Maps из массива
            'googleMapHtml'=>$googleMapsHtmlArray[fake()->numberBetween(0, 5)],
            // Генерация случайного времени открытия
            'openTime'=>fake()->time(),
            // Генерация случайного времени закрытия
            'closeTime'=>fake()->time(),
        ];
    }
}
