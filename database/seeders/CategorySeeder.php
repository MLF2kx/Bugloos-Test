<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {

            DB::table('categories')
                ->insert([
                    'id' => 1,
                    'parent_id' => NULL,
                    'title' => 'لوازم خانگی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 2,
                    'parent_id' => '1',
                    'title' => 'لوازم خانگی برقی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 3,
                    'parent_id' => '1',
                    'title' => 'مبلمان و صنایع چوبی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 4,
                    'parent_id' => '1',
                    'title' => 'فرش، موکت ، پرده و تزیینات',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 5,
                    'parent_id' => '1',
                    'title' => 'خانه و آشپزخانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 6,
                    'parent_id' => '1',
                    'title' => 'صنایع دستی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 7,
                    'parent_id' => '1',
                    'title' => 'لوازم حمام و کالای خواب',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 8,
                    'parent_id' => '2',
                    'title' => 'یخچال و فریزر',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 9,
                    'parent_id' => '2',
                    'title' => 'لوازم پخت و پز',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 10,
                    'parent_id' => '2',
                    'title' => 'اتو',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 11,
                    'parent_id' => '2',
                    'title' => 'تهویه ،سرمایش و گرمایش',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 12,
                    'parent_id' => '2',
                    'title' => 'صوتی و تصویری',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 13,
                    'parent_id' => '2',
                    'title' => 'خردکن و غذاساز',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 14,
                    'parent_id' => '2',
                    'title' => 'آبمیوه گیری و نوشیدنی ساز',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 15,
                    'parent_id' => '2',
                    'title' => 'شست و شو و نظافت',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 16,
                    'parent_id' => '2',
                    'title' => 'جاروبرقی و شارژی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 17,
                    'parent_id' => '2',
                    'title' => 'هود و گاز',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 18,
                    'parent_id' => '3',
                    'title' => 'مبلمان راحتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 19,
                    'parent_id' => '3',
                    'title' => 'سرویس خواب',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 20,
                    'parent_id' => '3',
                    'title' => 'کمد',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 21,
                    'parent_id' => '3',
                    'title' => 'میز جلو مبلی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 22,
                    'parent_id' => '3',
                    'title' => 'میز تلویزیون',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 23,
                    'parent_id' => '4',
                    'title' => 'فرش دستی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 24,
                    'parent_id' => '4',
                    'title' => 'فرش ماشینی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 25,
                    'parent_id' => '4',
                    'title' => 'روفرشی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 26,
                    'parent_id' => '4',
                    'title' => 'پرده پارچه ای',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 27,
                    'parent_id' => '5',
                    'title' => 'آشپزخانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 28,
                    'parent_id' => '5',
                    'title' => 'ظروف پذیرایی، بلور و چینی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 29,
                    'parent_id' => '5',
                    'title' => 'ساعت',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 30,
                    'parent_id' => '5',
                    'title' => 'شمع و جاشمعی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 31,
                    'parent_id' => '5',
                    'title' => 'جعبه و صندوقچه ',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 32,
                    'parent_id' => '5',
                    'title' => 'باکس موسیقی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 33,
                    'parent_id' => '5',
                    'title' => 'مجسمه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 34,
                    'parent_id' => '5',
                    'title' => 'جاکلیدی و قاب عکس',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 35,
                    'parent_id' => '5',
                    'title' => 'گل و گلدان',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 36,
                    'parent_id' => '5',
                    'title' => 'تابلو سنتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 37,
                    'parent_id' => '5',
                    'title' => 'تابلو مدرن',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 38,
                    'parent_id' => '5',
                    'title' => 'تابلو نقاشی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 39,
                    'parent_id' => '5',
                    'title' => 'لوستر و آباژور',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 40,
                    'parent_id' => '5',
                    'title' => 'لوازم قنادی و شیرینی پزی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 41,
                    'parent_id' => '5',
                    'title' => 'لوازم سفر',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 42,
                    'parent_id' => '6',
                    'title' => 'مینا و خاتم',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 43,
                    'parent_id' => '6',
                    'title' => 'فرش گلیم گبه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 44,
                    'parent_id' => '6',
                    'title' => 'مس و قلم زنی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 45,
                    'parent_id' => '6',
                    'title' => 'شیشه سفال و کاشی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 46,
                    'parent_id' => '6',
                    'title' => 'ارمغان شهرها',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 47,
                    'parent_id' => '6',
                    'title' => 'سنگ ها و گوهرها',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 48,
                    'parent_id' => '7',
                    'title' => 'حوله و کالای خواب',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 49,
                    'parent_id' => NULL,
                    'title' => 'پوشاک',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 50,
                    'parent_id' => '49',
                    'title' => 'کیف و کفش و محصولات چرمی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 51,
                    'parent_id' => '49',
                    'title' => 'پوشاک زنانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 52,
                    'parent_id' => '49',
                    'title' => 'پوشاک مردانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 53,
                    'parent_id' => '49',
                    'title' => 'پوشاک بچه گانه و نوزادی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 54,
                    'parent_id' => '49',
                    'title' => 'اکسسوری و بدلیجات',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 55,
                    'parent_id' => '50',
                    'title' => 'کیف رودوشی و مجلسی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 56,
                    'parent_id' => '50',
                    'title' => 'کوله پشتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 57,
                    'parent_id' => '50',
                    'title' => 'کیف پول و مدارک',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 58,
                    'parent_id' => '50',
                    'title' => 'کیف کمری و آرایش',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 59,
                    'parent_id' => '50',
                    'title' => 'کیف دستی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 60,
                    'parent_id' => '50',
                    'title' => 'کیف پیپ و سیگار',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 61,
                    'parent_id' => '50',
                    'title' => 'ست چرمی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 62,
                    'parent_id' => '50',
                    'title' => 'کفش ورزشی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 63,
                    'parent_id' => '50',
                    'title' => 'کفش زنانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 64,
                    'parent_id' => '50',
                    'title' => 'کفش بچه گانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 65,
                    'parent_id' => '50',
                    'title' => 'کفش مردانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 66,
                    'parent_id' => '51',
                    'title' => 'شال و روسری',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 67,
                    'parent_id' => '51',
                    'title' => 'تاپ ، تی شرت ، سارافون',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 68,
                    'parent_id' => '51',
                    'title' => 'شلوار',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 69,
                    'parent_id' => '51',
                    'title' => 'لباس زیر و جوراب',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 70,
                    'parent_id' => '51',
                    'title' => 'مانتو',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 71,
                    'parent_id' => '52',
                    'title' => 'شلوار',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 72,
                    'parent_id' => '52',
                    'title' => 'پیراهن',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 73,
                    'parent_id' => '52',
                    'title' => 'کت و شلوار و کاپشن',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 74,
                    'parent_id' => '52',
                    'title' => 'لباس زیر ، راحتی و جوراب',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 75,
                    'parent_id' => '52',
                    'title' => 'کمربند',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 76,
                    'parent_id' => '53',
                    'title' => 'پوشاک پسرانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 77,
                    'parent_id' => '53',
                    'title' => 'پوشاک دخترانه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 78,
                    'parent_id' => '53',
                    'title' => 'پوشاک نوزادی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 79,
                    'parent_id' => '54',
                    'title' => 'گردنبند',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 80,
                    'parent_id' => '54',
                    'title' => 'انگشتر',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 81,
                    'parent_id' => '54',
                    'title' => 'دستبند و مچ بند',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 82,
                    'parent_id' => '54',
                    'title' => 'گوشواره',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 83,
                    'parent_id' => '54',
                    'title' => 'ست و نیم ست',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 84,
                    'parent_id' => '54',
                    'title' => 'ساعت ',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 85,
                    'parent_id' => '54',
                    'title' => 'کراوات و پاپیون',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 86,
                    'parent_id' => '54',
                    'title' => 'عینک',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 87,
                    'parent_id' => '54',
                    'title' => 'سایر اکسسوری ها',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 88,
                    'parent_id' => NULL,
                    'title' => 'آرایشی و مراقبتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 89,
                    'parent_id' => '88',
                    'title' => 'آرایشی بهداشتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 90,
                    'parent_id' => '88',
                    'title' => 'بهداشت و مراقبت از بدن',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 91,
                    'parent_id' => '88',
                    'title' => 'پزشکی بهداشتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 92,
                    'parent_id' => '89',
                    'title' => 'آرایش چشم و ابرو',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 93,
                    'parent_id' => '89',
                    'title' => 'آرایش صورت',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 94,
                    'parent_id' => '89',
                    'title' => 'آرایش مو و اصلاح',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 95,
                    'parent_id' => '89',
                    'title' => 'تجهیزات آرایشگاهی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 96,
                    'parent_id' => '89',
                    'title' => 'بهداشت و زیبایی ناخن',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 97,
                    'parent_id' => '89',
                    'title' => 'کرم و مراقبت پوست',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 98,
                    'parent_id' => '89',
                    'title' => 'شامپو و مراقبت مو',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 99,
                    'parent_id' => '89',
                    'title' => 'سشوار،اتو مو و بیگودی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 100,
                    'parent_id' => '89',
                    'title' => 'ماشین اصلاح',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 101,
                    'parent_id' => '90',
                    'title' => 'بهداشت دهان و دندان',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 102,
                    'parent_id' => '90',
                    'title' => 'عطر، ادکلن و اسپری',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 103,
                    'parent_id' => '91',
                    'title' => 'ماسک و گان بهداشتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 104,
                    'parent_id' => NULL,
                    'title' => 'مواد خوراکی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 105,
                    'parent_id' => '104',
                    'title' => 'سوپرمارکتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 106,
                    'parent_id' => '104',
                    'title' => 'نوشیدنی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 107,
                    'parent_id' => '104',
                    'title' => 'شوینده و ضد عفونی کننده',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 108,
                    'parent_id' => '105',
                    'title' => 'خشکبار',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 109,
                    'parent_id' => '106',
                    'title' => 'قهوه ،نسکافه و هات چاکلت',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 110,
                    'parent_id' => '106',
                    'title' => 'شربت و آبمیوه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 111,
                    'parent_id' => '106',
                    'title' => 'آب معدنی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 112,
                    'parent_id' => '106',
                    'title' => 'نوشابه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 113,
                    'parent_id' => '106',
                    'title' => 'ماءالشعیر',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 114,
                    'parent_id' => '106',
                    'title' => 'عرقیات و گلاب',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 115,
                    'parent_id' => '106',
                    'title' => 'دمنوش',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 116,
                    'parent_id' => '106',
                    'title' => 'چای',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 117,
                    'parent_id' => '106',
                    'title' => 'مواد غذایی و خوراکی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 118,
                    'parent_id' => '106',
                    'title' => 'شکلات کادویی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 119,
                    'parent_id' => '107',
                    'title' => 'بهداشتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 120,
                    'parent_id' => '107',
                    'title' => 'ابزار نظافت',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 121,
                    'parent_id' => '107',
                    'title' => 'مواد شوینده',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 122,
                    'parent_id' => NULL,
                    'title' => 'نوشت افزار و بازی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 123,
                    'parent_id' => '122',
                    'title' => 'کتاب و لوازم تحریر',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 124,
                    'parent_id' => '122',
                    'title' => 'اسباب بازی و فکری',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 125,
                    'parent_id' => '123',
                    'title' => 'کتاب',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 126,
                    'parent_id' => '123',
                    'title' => 'جامدادی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 127,
                    'parent_id' => '123',
                    'title' => 'کاور دفترچه',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 128,
                    'parent_id' => '123',
                    'title' => 'لوازم تحریر',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 129,
                    'parent_id' => '124',
                    'title' => 'عروسک',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 130,
                    'parent_id' => '124',
                    'title' => 'بازی فکری',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 131,
                    'parent_id' => '124',
                    'title' => 'اسباب بازی برقی و الکترونیکی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 132,
                    'parent_id' => '124',
                    'title' => 'اسباب بازی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 133,
                    'parent_id' => NULL,
                    'title' => 'دیجیتال',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 134,
                    'parent_id' => '133',
                    'title' => 'محصولات فناورانه و دیجیتال',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 135,
                    'parent_id' => '134',
                    'title' => 'موبایل و کامپیوتر',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 136,
                    'parent_id' => '134',
                    'title' => 'تبلت و فبلت',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 137,
                    'parent_id' => '134',
                    'title' => 'اکسسوری موبایل ',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 138,
                    'parent_id' => '134',
                    'title' => 'ماشین آلات خاص',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 139,
                    'parent_id' => '134',
                    'title' => 'نرم افزار',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 140,
                    'parent_id' => '134',
                    'title' => 'دستگاه های هوشمند',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 141,
                    'parent_id' => NULL,
                    'title' => 'صنعتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 142,
                    'parent_id' => '141',
                    'title' => 'دام و طیور',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 143,
                    'parent_id' => '141',
                    'title' => 'تجهیزات باغی و کشاورزی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 144,
                    'parent_id' => '141',
                    'title' => 'ابزار الات صنعتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 145,
                    'parent_id' => '141',
                    'title' => 'ساختمان',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 146,
                    'parent_id' => '142',
                    'title' => 'تجهیزات مرغداری',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 147,
                    'parent_id' => '142',
                    'title' => 'تجهیزات دامداری ',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 148,
                    'parent_id' => '142',
                    'title' => 'نهاده های دامی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 149,
                    'parent_id' => '142',
                    'title' => 'فرآورده های دام',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 150,
                    'parent_id' => '143',
                    'title' => 'تجهیزات و ابزارآلات',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 151,
                    'parent_id' => '143',
                    'title' => 'ماشین آلات سنگین کشاورزی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 152,
                    'parent_id' => '143',
                    'title' => 'ماشین آلات سبک کشاورزی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 153,
                    'parent_id' => '143',
                    'title' => 'سم',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 154,
                    'parent_id' => '143',
                    'title' => 'کود',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 155,
                    'parent_id' => '143',
                    'title' => 'تجهیزات آبرسانی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 156,
                    'parent_id' => '143',
                    'title' => 'محصولات کشاورزی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 157,
                    'parent_id' => '143',
                    'title' => 'محصولات باغی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 158,
                    'parent_id' => '144',
                    'title' => 'رنگ ها و حلال ها',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 159,
                    'parent_id' => '144',
                    'title' => 'چسب ها و رزین ها',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 160,
                    'parent_id' => '144',
                    'title' => 'ابزارآلات صنعتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 161,
                    'parent_id' => '144',
                    'title' => 'صنایع الکتریک و روشنایی ',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 162,
                    'parent_id' => '144',
                    'title' => 'سیم و کابل',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 163,
                    'parent_id' => '144',
                    'title' => 'لامپ',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 164,
                    'parent_id' => '144',
                    'title' => 'پرژکتور',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 165,
                    'parent_id' => '144',
                    'title' => 'کلید و پریز',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 166,
                    'parent_id' => '144',
                    'title' => 'لوازم برقی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 167,
                    'parent_id' => '144',
                    'title' => 'مواد اولیه و بسته بندی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 168,
                    'parent_id' => '144',
                    'title' => 'پتروشیمی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 169,
                    'parent_id' => '144',
                    'title' => 'صنایع غذایی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 170,
                    'parent_id' => '144',
                    'title' => 'بسته بندی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 171,
                    'parent_id' => '145',
                    'title' => 'شیرآلات بهداشتی',
                ]);
            DB::table('categories')
                ->insert([
                    'id' => 172,
                    'parent_id' => '145',
                    'title' => 'کاشی و سرامیک',
                ]);
        });
    }
}
