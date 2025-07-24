<?php

namespace Database\Seeders;

use App\Models\AboutContent;
use Illuminate\Database\Seeder;

class AboutContentSeeder extends Seeder
{
    public function run(): void
    {
        $records = [
            [
                'id' => 1,
                'page_name_en' => 'About',
                'page_name_ar' => 'عن',

                // Section 1
                    'section_1_title_en' => 'About',
                    'section_1_description_en' => 'We make storage easy and accessible with transparent pricing and flexible options. Whether it\'s seasonal items, business supplies, or personal belongings, we keep your things safe and secure, ready for you whenever you need them.',
                    'section_1_title_ar' => 'عن',
                    'section_1_description_ar' => 'نجعل التخزين سهلاً وفي متناول الجميع بأسعار شفافة وخيارات مرنة. سواءً كانت أغراضًا موسمية، أو لوازم عمل، أو ممتلكات شخصية، نحافظ على أغراضك آمنة ومأمونة، جاهزةً لك وقتما تحتاجها.',
                // Section 1

                // Section 2
                    'section_2_title_en' => 'Our Story',
                    'section_2_description_en' => '<p>Since our company was founded, we\'ve been committed to providing reliable and efficient logistics solutions to our clients across the region. With our specialized team and modern infrastructure, we have built long-term relationships based on trust and quality. Our vision is to be the preferred partner in warehousing and logistics by focusing on innovation, dedication, and continuous growth.</p>',
                    'section_2_number_1_en' => '2100+',
                    'section_2_text_1_en' => 'Warehouse',
                    'section_2_number_2_en' => '17+',
                    'section_2_text_2_en' => 'Years of Experience',
                    'section_2_number_3_en' => '2100+',
                    'section_2_text_3_en' => 'Clients',

                    'section_2_title_ar' => 'قصتنا',
                    'section_2_description_ar' => '<p>منذ تأسيس شركتنا، التزمنا بتقديم حلول لوجستية موثوقة وفعّالة لعملائنا في جميع أنحاء المنطقة. بفضل فريقنا المتخصص وبنيتنا التحتية الحديثة، بنينا علاقات طويلة الأمد قائمة على الثقة والجودة. رؤيتنا هي أن نكون الشريك الأمثل في مجال التخزين والخدمات اللوجستية، من خلال التركيز على الابتكار والتفاني والنمو المستمر.</p>',
                    'section_2_number_1_ar' => '2100+',
                    'section_2_text_1_ar' => 'مستودع',
                    'section_2_number_2_ar' => '17+',
                    'section_2_text_2_ar' => 'سنوات الخبرة',
                    'section_2_number_3_ar' => '2100+',
                    'section_2_text_3_ar' => 'العملاء',
                // Section 2

                // Section 3
                    'section_3_left_title_1_en' => 'Our Value',
                    'section_3_left_description_1_en' => 'Where Your Growth Meets Opportunity',
                    'section_3_left_title_2_en' => 'Our Mission',
                    'section_3_left_description_2_en' => 'Bridging the Gap Between You and the Perfect Space',
                    'section_3_left_title_3_en' => 'Our Vision',
                    'section_3_left_description_3_en' => 'Empowering Businesses to Thrive in a Boundless Future',
                    'section_3_right_title_1_en' => 'From startups to enterprises, we grow with you.',
                    'section_3_right_description_1_en' => 'Every business, big or small, deserves a space that adapts and evolves. We\'re here to provide flexible warehouse solutions that scale alongside your success.',
                    'section_3_right_title_2_en' => 'We make storage accessible for all, anytime.',
                    'section_3_right_description_2_en' => 'Our platform makes finding the right warehouse space effortless, empowering you with the tools to manage logistics and streamline operations without the hassle anytime.',
                    'section_3_right_title_3_en' => 'Every business deserves the space to thrive.',
                    'section_3_right_description_3_en' => 'We believe in breaking down barriers to growth. Our vision is to provide every business, no matter its size, with the warehouse space it needs to reach new heights.',

                    'section_3_left_title_1_ar' => 'قيمتنا',
                    'section_3_left_description_1_ar' => 'حيث يلتقي نموك بالفرصة',
                    'section_3_left_title_2_ar' => 'مهمتنا',
                    'section_3_left_description_2_ar' => 'سد الفجوة بينك وبين المكان المثالي',
                    'section_3_left_title_3_ar' => 'رؤيتنا',
                    'section_3_left_description_3_ar' => 'تمكين الشركات من النجاح في مستقبل بلا حدود',
                    'section_3_right_title_1_ar' => 'من الشركات الناشئة إلى الشركات الكبرى، نحن ننمو معك.',
                    'section_3_right_description_1_ar' => 'كل شركة، كبيرة كانت أم صغيرة، تستحق مساحةً تتكيف وتتطور. نحن هنا لنقدم لكم حلول مستودعات مرنة تتناسب مع نجاحكم.',
                    'section_3_right_title_2_ar' => 'نحن نجعل التخزين متاحًا للجميع، في أي وقت.',
                    'section_3_right_description_2_ar' => 'منصتنا تجعل العثور على مساحة المستودع المناسبة أمرًا سهلاً، وتمكنك من الحصول على الأدوات اللازمة لإدارة الخدمات اللوجستية وتبسيط العمليات دون أي متاعب في أي وقت.',
                    'section_3_right_title_3_ar' => 'كل عمل تجاري يستحق المساحة اللازمة للنمو والازدهار.',
                    'section_3_right_description_3_ar' => 'نؤمن بكسر حواجز النمو. رؤيتنا هي تزويد كل شركة، مهما كان حجمها، بمساحة المستودعات التي تحتاجها للوصول إلى آفاق جديدة.',
                // Section 3

                // Section 4
                    'section_4_title_en' => 'Who Can Use Warehouse Exchange?',
                    'section_4_description_en' => '<p>Our Warehouse Exchange lets you easily access a variety of spaces, whether you\'re a business in need of inventory storage or someone seeking a safe place for personal belongings. With options to rent, exchange, or share warehouse spaces, you can quickly find the perfect match that meets your specific needs.</p><p>&nbsp;</p><p>Whether it\'s for short-term business storage, long-term personal use, or anything in between, our platform is designed to make warehouse exchanges seamless and hassle-free.</p>',
                    'section_4_button_en' => 'Learn More',
                    'section_4_image_1_title_en' => 'Business Storages',
                    'section_4_image_2_title_en' => 'Personal Storages',

                    'section_4_title_ar' => 'من يمكنه استخدام تبادل المستودعات؟',
                    'section_4_description_ar' => 'تتيح لك خدمة تبادل المستودعات لدينا الوصول بسهولة إلى مجموعة متنوعة من المساحات، سواءً كنت شركةً بحاجة إلى تخزين بضائعك أو تبحث عن مكان آمن لممتلكاتك الشخصية. مع خيارات استئجار أو تبادل أو مشاركة مساحات المستودعات، يمكنك بسهولة العثور على الخيار الأمثل الذي يلبي احتياجاتك الخاصة.</p><p>&nbsp;</p><p>سواءً كنتَ ترغب في تخزين أعمالك على المدى القصير، أو للاستخدام الشخصي طويل الأمد، أو لأي غرض آخر، صُممت منصتنا لجعل تبادل المستودعات سلسًا وخاليًا من المتاعب.</p>',
                    'section_4_button_ar' => 'يتعلم أكثر',
                    'section_4_image_1_title_ar' => 'مخازن الأعمال',
                    'section_4_image_2_title_ar' => 'التخزين الشخصي',
                // Section 4

                // Section 5
                    'section_5_title_en' => 'How does the procedure work?',
                    'section_5_description_en' => 'You send us your requirements, and our team creates a customized logistics or storage plan.',
                    'section_5_point_1_en' => 'Register',
                    'section_5_point_1_description_en' => 'Create your account in just a few steps.',
                    'section_5_point_2_en' => 'Search for Space',
                    'section_5_point_2_description_en' => 'Find the perfect storage or warehouse space.',
                    'section_5_point_3_en' => 'Receive Quotes',
                    'section_5_point_3_description_en' => 'Get price offers from trusted providers.',
                    'section_5_point_4_en' => 'Make Payment',
                    'section_5_point_4_description_en' => 'Pay securely through our platform.',
                    'section_5_point_5_en' => 'Space is Yours',
                    'section_5_point_5_description_en' => 'Your space is now reserved and ready.',

                    'section_5_title_ar' => 'كيف تتم هذه العملية؟',
                    'section_5_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_5_point_1_ar' => 'يسجل',
                    'section_5_point_1_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'section_5_point_2_ar' => 'البحث عن الفضاء',
                    'section_5_point_2_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'section_5_point_3_ar' => 'تلقي عروض الأسعار',
                    'section_5_point_3_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'section_5_point_4_ar' => 'قم بالدفع',
                    'section_5_point_4_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    'section_5_point_5_ar' => 'الفضاء لك',
                    'section_5_point_5_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                // Section 5

                // Section 6
                    'section_6_title_en' => 'Lorem ipsum',
                    'section_6_point_1_en' => 'Lorem ipsum',
                    'section_6_point_1_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_2_en' => 'Lorem ipsum',
                    'section_6_point_2_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_3_en' => 'Lorem ipsum',
                    'section_6_point_3_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_4_en' => 'Lorem ipsum',
                    'section_6_point_4_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_5_en' => 'Lorem ipsum',
                    'section_6_point_5_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_6_en' => 'Lorem ipsum',
                    'section_6_point_6_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',

                    'section_6_title_ar' => 'Lorem ipsum',
                    'section_6_point_1_ar' => 'Lorem ipsum',
                    'section_6_point_1_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_2_ar' => 'Lorem ipsum',
                    'section_6_point_2_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_3_ar' => 'Lorem ipsum',
                    'section_6_point_3_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_4_ar' => 'Lorem ipsum',
                    'section_6_point_4_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_5_ar' => 'Lorem ipsum',
                    'section_6_point_5_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'section_6_point_6_ar' => 'Lorem ipsum',
                    'section_6_point_6_description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                // Section 6

                // Section 7
                    'section_7_title_en' => 'A Note from the Founders',
                    'section_7_description_en' => '<p>“We started with a simple idea - to provide businesses of all sizes with flexible, scalable warehouse solutions that grow with them. We know firsthand the challenges of finding the right space, and our mission is to make that process seamless, efficient, and tailored to your needs.”</p><p>&nbsp;</p><p>We believe every business, whether it\'s just starting or scaling, deserves a space where it can thrive. Our team is committed to your success, and we\'re excited to be part of your journey. Let\'s build something great together.”</p>',
                    'section_7_signature_en' => 'The Founders Team',

                    'section_7_title_ar' => 'ملاحظة من المؤسسين',
                    'section_7_description_ar' => '<p>بدأنا بفكرة بسيطة - تزويد الشركات بمختلف أحجامها بحلول مستودعات مرنة وقابلة للتوسع، تواكب نموها. ندرك تمامًا تحديات العثور على المساحة المناسبة، ومهمتنا هي جعل هذه العملية سلسة وفعالة ومصممة خصيصًا لتلبية احتياجاتكم.</p><p>نؤمن بأن كل شركة، سواءً كانت ناشئة أو في طور النمو، تستحق مساحةً تزدهر فيها. فريقنا ملتزم بنجاحكم، ويسعدنا أن نكون جزءًا من رحلتكم. دعونا نبني معًا شيئًا رائعًا.</p>',
                    'section_7_signature_ar' => 'فريق المؤسسين',
                // Section 7

                // Section 8
                    'section_8_title_en' => 'Instant Access to Transparent Storage Pricing - Right in Your Inbox Now!',
                    'section_8_description_en' => 'Enter your details to receive a straightforward storage price list sent straight to you!',
                    'section_8_name_en' => 'Name',
                    'section_8_name_placeholder_en' => 'Please enter your name',
                    'section_8_email_en' => 'Email',
                    'section_8_email_placeholder_en' => 'Ex: johnmercury@gmail.com',
                    'section_8_check_label_en' => 'I have read and agree to the Terms and Conditions of the platform.',
                    'section_8_button_en' => 'Submit Now',

                    'section_8_title_ar' => 'الوصول الفوري إلى أسعار التخزين الشفافة - مباشرة في صندوق الوارد الخاص بك الآن!',
                    'section_8_description_ar' => 'أدخل تفاصيلك لتلقي قائمة أسعار التخزين المباشرة المرسلة إليك مباشرةً!',
                    'section_8_name_ar' => 'اسم',
                    'section_8_name_placeholder_ar' => 'الرجاء إدخال اسمك',
                    'section_8_email_ar' => 'بريد إلكتروني',
                    'section_8_email_placeholder_ar' => 'مثال: johnmercury@gmail.com',
                    'section_8_check_label_ar' => 'لقد قرأت ووافقت على الشروط والأحكام الخاصة بالمنصة.',
                    'section_8_button_ar' => 'أرسل الآن',
                // Section 8

                // Section 9
                    'section_9_title_en' => 'Trusted by Many, See What Our Customers Think',
                    'section_9_description_en' => 'See why our customers love us! Feedback from those who trust us with their business needs.',

                    'section_9_title_ar' => 'موثوق به من قبل العديد من الأشخاص، شاهد ما يعتقده عملاؤنا',
                    'section_9_description_ar' => 'اكتشف لماذا يحبنا عملاؤنا! آراء من يثقون بنا لتلبية احتياجات أعمالهم.',
                // Section 9

                // Section 10
                    'section_10_title_en' => 'A network that provides smooth access to and from every corner of the world, anytime.',

                    'section_10_title_ar' => 'شبكة توفر وصولاً سلسًا إلى جميع أنحاء العالم ومنه، في أي وقت.',
                // Section 10

                // Section 11
                    'section_11_title_en' => 'Have questions?',
                    'section_11_description_en' => 'We\'ve compiled answers to the most common inquiries. Browse through our FAQs for quick and easy information. If you need further assistance, feel free to reach out!',
                    'section_11_faqs_en' => '[{"question":"Question 1","answer":"Lorem Ipsum Question 1"},{"question":"Question 2","answer":"Lorem Ipsum Question 2"}]',
                    
                    'section_11_title_ar' => 'هل لديك أسئلة؟',
                    'section_11_description_ar' => 'لقد جمعنا إجاباتٍ لأكثر الاستفسارات شيوعًا. تصفّح قسم الأسئلة الشائعة للحصول على معلوماتٍ سريعة وسهلة. إذا كنت بحاجةٍ إلى مزيدٍ من المساعدة، فلا تتردد في التواصل معنا!',
                    'section_11_faqs_ar' => '[{"question":"السؤال 1","answer":"السؤال الأول من نص لوريم إيبسوم"},{"question":"السؤال الثاني","answer":"السؤال الثاني من نص لوريم إيبسوم"}]',
                // Section 11
            ]
        ];

        foreach($records as $record) {
            AboutContent::updateOrCreate(
                ['id' => $record['id']],
                $record
            );
        }
    }
}
