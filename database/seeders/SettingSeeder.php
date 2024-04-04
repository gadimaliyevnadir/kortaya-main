<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Language;
use App\Models\Setting;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    public function run()
    {
        activity()->withoutLogs(function () {
            $langs = Language::get();

            $settings = [
                [
                    'name' => 'location',
                    'code' => 'location',
                    'slug' => 'location',
                    'content' => 'Ünvan: Şərifzadə küç.19, Bakı, Azərbaycan, AZ1138'
                ],
                [
                    'name' => 'phone',
                    'code' => 'phone',
                    'slug' => 'phone',
                    'content' => '(+994 51) 432 04 08'
                ],
                [
                    'name' => 'email',
                    'code' => 'email',
                    'slug' => 'email',
                    'content' => 'info@gdfgfd.az'
                ],
                [
                    'name' => 'youtube',
                    'code' => 'youtube',
                    'slug' => 'youtube',
                    'content' => 'https://www.youtube.com/'
                ],
                [
                    'code' => 'facebook',
                    'name' => 'facebook',
                    'slug' => 'facebook',
                    'content' => 'https://www.facebook.com/'
                ],
                [
                    'name' => 'linkedin',
                    'code' => 'linkedin',
                    'slug' => 'linkedin',
                    'content' => 'https://www.linkedin.com/'
                ],
                [
                    'name' => 'twitter',
                    'code' => 'twitter',
                    'slug' => 'twitter',
                    'content' => 'https://twitter.com/'
                ],
                [
                    'code' => 'vimeo',
                    'name' => 'vimeo',
                    'slug' => 'vimeo',
                    'content' => 'https://vimeo.com/'
                ],
                [
                    'code' => 'contact_us_text',
                    'name' => 'contact_us_text',
                    'slug' => 'contact_us_text',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing sed do eiusmod tempor incididun'
                ],
                [
                    'code' => 'terms_and_conditions',
                    'name' => 'terms_and_conditions',
                    'slug' => 'terms_and_conditions',
                    'content' => '● Article 1 (Purpose)
The purpose of the following Terms and Conditions of Use(‘T&C’) is to establish guidelines on rights, duties and responsibilities of cybermall Users utilizing the internet-related services (hereinafter referred to as the ‘Services’) provided by the cybermall (hereinafter referred to as the ‘Mall’) operated by company (e-commerce company). 『Unless transactions contradict its properties, the following terms apply to e-commerce transactions utilizing methods of PC communication, wireless and others』

● Article 2 (Definition)
① ‘Mall’ refers to a virtual business site established by company to trade goods or services (hereinafter referred to as ‘Goods and Services’) using computers and information communication facilities to provide Goods and Services to Users. The term can also be defined as a company operating a cybermall. ② ‘User’ refers to a Member and Non-Member who has accessed the ‘Mall’ to use the services provided by the ‘Mall’ in accordance with this T&C. ③ ‘Member’ refers to a person who subscribes to become a Member by providing personal information to the ‘Mall’ and receive information about the ‘Mall’ and become a continual User of the services provided by the ‘Mall.’ ④ ‘Non-Member’ refers to a User of services provided by the ‘Mall’ without subscription.

● Article 3 (Display, Explanation and Amendment of Terms and Conditions of Use)
① The ‘Mall’ shall, for easy recognition by Users, display the contents of this T&C, name of company and representative, business address(including an address handling customer complaints), phone number, fax number, email address, business license number, e-commerce permit number, and the name of personal information manager on the main page of the ‘Mall’. Only the content of this T&C can be displayed though a link page. ② Prior to User’s final agreement to this T&C, the ‘Mall’ shall provide a separate link or pop-up screen to obtain User’s verification on the terms of cancellation rights, delivery responsibilities, refund conditions and other important details. ③ The ‘Mall’ may make amendments within the permissible range without violating applicable laws such as Consumer Protection Laws, Regulation of T&C Act, e-commerce Transaction Act, Electronic Signature Act, Information and Communication Network Promotion Act, Door-To-Door Sales Act, and other related Consumer Protection Laws. ④ The ‘Mall’ shall specify the effective date and the reasons for amendment of the terms and have post on the initial screen for 7 days prior to effective date until the day before the effective date. If the amendment is modified to the User’s disadvantage, then the ‘Mall’ shall grant at least 30 days of grace period for notice. In this case, the ‘Mall’ shall clarify the ‘before and after’ changes in an ‘easy-to-understand’ manner. ⑤ When the ‘Mall’ makes an amendment to the T&C, the modified T&C shall be applied only to contracts concluded after the effective date, whereas all contracts concluded before the effective date will remain under the provisions of the old T&C. However, if the User who has already signed the contract wishes to have the amendments administered, then the User may send his/her intent to the ‘Mall’ and acquire consent from the ‘Mall’ within the notice period stated in Clause ③ and it shall be applied accordingly. ⑥ Any information not specified and interpreted in this T&C shall be in accordance with the e-commerce Transaction Guidelines and Related Consumer Protection Acts provided by the Fair Trade Commission and other applicable Consumer Protection Laws and Regulation of T&C Act.

● Article 3 (Display, Explanation and Amendment of Terms and Conditions of Use)
① The ‘Mall’ shall, for easy recognition by Users, display the contents of this T&C, name of company and representative, business address(including an address handling customer complaints), phone number, fax number, email address, business license number, e-commerce permit number, and the name of personal information manager on the main page of the ‘Mall’. Only the content of this T&C can be displayed though a link page. ② Prior to User’s final agreement to this T&C, the ‘Mall’ shall provide a separate link or pop-up screen to obtain User’s verification on the terms of cancellation rights, delivery responsibilities, refund conditions and other important details. ③ The ‘Mall’ may make amendments within the permissible range without violating applicable laws such as Consumer Protection Laws, Regulation of T&C Act, e-commerce Transaction Act, Electronic Signature Act, Information and Communication Network Promotion Act, Door-To-Door Sales Act, and other related Consumer Protection Laws. ④ The ‘Mall’ shall specify the effective date and the reasons for amendment of the terms and have post on the initial screen for 7 days prior to effective date until the day before the effective date. If the amendment is modified to the User’s disadvantage, then the ‘Mall’ shall grant at least 30 days of grace period for notice. In this case, the ‘Mall’ shall clarify the ‘before and after’ changes in an ‘easy-to-understand’ manner. ⑤ When the ‘Mall’ makes an amendment to the T&C, the modified T&C shall be applied only to contracts concluded after the effective date, whereas all contracts concluded before the effective date will remain under the provisions of the old T&C. However, if the User who has already signed the contract wishes to have the amendments administered, then the User may send his/her intent to the ‘Mall’ and acquire consent from the ‘Mall’ within the notice period stated in Clause ③ and it shall be applied accordingly. ⑥ Any information not specified and interpreted in this T&C shall be in accordance with the e-commerce Transaction Guidelines and Related Consumer Protection Acts provided by the Fair Trade Commission and other applicable Consumer Protection Laws and Regulation of T&C Act.

● Article 3 (Display, Explanation and Amendment of Terms and Conditions of Use)
① The ‘Mall’ shall, for easy recognition by Users, display the contents of this T&C, name of company and representative, business address(including an address handling customer complaints), phone number, fax number, email address, business license number, e-commerce permit number, and the name of personal information manager on the main page of the ‘Mall’. Only the content of this T&C can be displayed though a link page. ② Prior to User’s final agreement to this T&C, the ‘Mall’ shall provide a separate link or pop-up screen to obtain User’s verification on the terms of cancellation rights, delivery responsibilities, refund conditions and other important details. ③ The ‘Mall’ may make amendments within the permissible range without violating applicable laws such as Consumer Protection Laws, Regulation of T&C Act, e-commerce Transaction Act, Electronic Signature Act, Information and Communication Network Promotion Act, Door-To-Door Sales Act, and other related Consumer Protection Laws. ④ The ‘Mall’ shall specify the effective date and the reasons for amendment of the terms and have post on the initial screen for 7 days prior to effective date until the day before the effective date. If the amendment is modified to the User’s disadvantage, then the ‘Mall’ shall grant at least 30 days of grace period for notice. In this case, the ‘Mall’ shall clarify the ‘before and after’ changes in an ‘easy-to-understand’ manner. ⑤ When the ‘Mall’ makes an amendment to the T&C, the modified T&C shall be applied only to contracts concluded after the effective date, whereas all contracts concluded before the effective date will remain under the provisions of the old T&C. However, if the User who has already signed the contract wishes to have the amendments administered, then the User may send his/her intent to the ‘Mall’ and acquire consent from the ‘Mall’ within the notice period stated in Clause ③ and it shall be applied accordingly. ⑥ Any information not specified and interpreted in this T&C shall be in accordance with the e-commerce Transaction Guidelines and Related Consumer Protection Acts provided by the Fair Trade Commission and other applicable Consumer Protection Laws and Regulation of T&C Act.

● Article 3 (Display, Explanation and Amendment of Terms and Conditions of Use)
① The ‘Mall’ shall, for easy recognition by Users, display the contents of this T&C, name of company and representative, business address(including an address handling customer complaints), phone number, fax number, email address, business license number, e-commerce permit number, and the name of personal information manager on the main page of the ‘Mall’. Only the content of this T&C can be displayed though a link page. ② Prior to User’s final agreement to this T&C, the ‘Mall’ shall provide a separate link or pop-up screen to obtain User’s verification on the terms of cancellation rights, delivery responsibilities, refund conditions and other important details. ③ The ‘Mall’ may make amendments within the permissible range without violating applicable laws such as Consumer Protection Laws, Regulation of T&C Act, e-commerce Transaction Act, Electronic Signature Act, Information and Communication Network Promotion Act, Door-To-Door Sales Act, and other related Consumer Protection Laws. ④ The ‘Mall’ shall specify the effective date and the reasons for amendment of the terms and have post on the initial screen for 7 days prior to effective date until the day before the effective date. If the amendment is modified to the User’s disadvantage, then the ‘Mall’ shall grant at least 30 days of grace period for notice. In this case, the ‘Mall’ shall clarify the ‘before and after’ changes in an ‘easy-to-understand’ manner. ⑤ When the ‘Mall’ makes an amendment to the T&C, the modified T&C shall be applied only to contracts concluded after the effective date, whereas all contracts concluded before the effective date will remain under the provisions of the old T&C. However, if the User who has already signed the contract wishes to have the amendments administered, then the User may send his/her intent to the ‘Mall’ and acquire consent from the ‘Mall’ within the notice period stated in Clause ③ and it shall be applied accordingly. ⑥ Any information not specified and interpreted in this T&C shall be in accordance with the e-commerce Transaction Guidelines and Related Consumer Protection Acts provided by the Fair Trade Commission and other applicable Consumer Protection Laws and Regulation of T&C Act.'
                ],
                [
                'code' => 'privacy_policy',
                'name' => 'privacy_policy',
                'slug' => 'privacy_policy',
                'content' => 'This sample form is provided to you as a reference. Prior to posting, please make the necessary adjustments in order to ensure that all information is in accordance with the terms of your shopping mall.



1.  Purposes of Collection and Use of Personal Information

A.  Contract fulfillment obligated by provision of services and settlement of payment for the services provided

Supply of content, purchase and payment, delivery of goods or billing statements and others, user authentication for financial transactions and financial services

B.  Member management

User authentication to access members-only service, identity verification, prevention of unauthorized or illegal use, membership subscription check, validation of user age, confirmation of consent/agreement from legal representative for users under the age of 14, handling of complaints and civil affairs, delivery of notices



2.  Types of Personal Information Collected : user ID, password, E-mail address, personal information of legal representative for users under the age of 14

3. Duration of Retention and Use of Personal Information

As a general rule, once the personal data has fulfilled the purposes for which they were collected, they will be discarded without delay. However, it shall be retained for a specified period of time due to the reasons mentioned below.

A.  Duration of Retention and Use of Personal Information

Retention pursuant to prevention of illegal transaction and internal shopping mall: OO years

B.  Retention pursuant to applicable laws

o Records on contracts or withdrawal of offers and the like:

- Reasons of retention: Act on Consumer Protection in the Electronic Commerce Transactions, Etc.

- Retention Period : 5 years

o Records on payment settlement and supply of goods etc.

- Reasons of retention: Act on Consumer Protection in the Electronic Commerce Transactions, Etc

- Retention Period : 5 years

o Records on processing of customer disputes and complaints

- Reasons of retention: Act on Consumer Protection in the Electronic Commerce Transactions, Etc

- Retention Period : 3 years

o Log records

- Reasons of retention: Communication Privacy Act

- Retention Period : 3 months

※ If you do not accept these terms, you will not be able to create an account with us.'
            ],
                [
                'code' => 'agree_to_receive_shopping_information',
                'name' => 'agree_to_receive_shopping_information',
                'slug' => 'agree_to_receive_shopping_information',
                'content' => 'However, some information will be sent without your agreement such as order/payment status and policy related articles.

You can join the membership without agreeing to the optional categories, and update your status anytime at Edit Profile page once you join the membership.'
                ],
            ];

            foreach ($settings as $item) {
                $setting = Setting::create([
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'slug' => $item['slug'],
                ]);
                foreach ($langs as $lang) {
                    $setting->translations()->create([
                        'locale' => $lang->code,
                        'setting_id' => $setting->id,
                        'content' => $item['content'],
                    ]);
                }
            }
// support 1 ----------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'free_shipping',
                'code' =>'free_shipping',
                'slug' => 'free_shipping',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'content' => 'Free shipping on all order',
                    'title' => 'FREE SHİPPİNG',
                ]);
            }
            $imageUrl = asset('frontend/assets/images/icons/feature-icon-2.png');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/setting_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'setting',
                'manipulationable_id' => $setting->id,
                'document' => 'setting_image/' . $imageName,
                'collection_name' => 'setting_image',
            ]);
            Storage::put($path, $response->getBody());
// support 2 ----------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'support',
                'code' =>'support',
                'slug' => 'support',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'content' => 'Support 24 hours a day',
                    'title' => 'SUPPORT 24/7',
                ]);
            }
            $imageUrl = asset('frontend/assets/images/icons/feature-icon-3.png');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/setting_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'setting',
                'manipulationable_id' => $setting->id,
                'document' => 'setting_image/' . $imageName,
                'collection_name' => 'setting_image',
            ]);
            Storage::put($path, $response->getBody());
// support 3 ----------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'money_return',
                'code' =>'money_return',
                'slug' => 'money_return',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'content' => 'Back guarantee under 5 days',
                    'title' => 'MONEY RETURN',
                ]);
            }
            $imageUrl = asset('frontend/assets/images/icons/feature-icon-4.png');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/setting_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'setting',
                'manipulationable_id' => $setting->id,
                'document' => 'setting_image/' . $imageName,
                'collection_name' => 'setting_image',
            ]);
            Storage::put($path, $response->getBody());
// support 4 ----------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'onevery_order',
                'code' =>'onevery_order',
                'slug' => 'onevery_order',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'content' => 'Onevery order over $150',
                    'title' => 'ORDER DİSCOUNT',
                ]);
            }
            $imageUrl = asset('frontend/assets/images/icons/feature-icon-1.png');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/setting_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'setting',
                'manipulationable_id' => $setting->id,
                'document' => 'setting_image/' . $imageName,
                'collection_name' => 'setting_image',
            ]);
            Storage::put($path, $response->getBody());
// ----------------------------------------------------------------------------------------------------------


// about us  ----------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'about_us',
                'code' =>'about_us',
                'slug' => 'about_us',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'content' => "We believe that every project existing in digital world is a result of an idea and every idea has a cause.
For this reason, our each design serves an idea. Our strength in design is reflected by our name, our care for details. Our specialist won't be afraid to go extra miles just to approach near perfection. We don't require everything to be perfect, but we need them to be perfectly cared for. That's a reason why we are willing to give contributions at best. Not a single detail is missed out under Billey's professional eyes.The amount of dedication and effort equals to the level of passion and by.",
                    'title' => 'About Our Destry Store',
                ]);
            }
            $imageUrl = asset('frontend/assets/images/about/1.jpg');
            $client = new Client();
            $response = $client->get($imageUrl);

            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
            $path = 'public/documents/setting_image/' . $imageName;
            Document::create([
                'manipulationable_type' => 'setting',
                'manipulationable_id' => $setting->id,
                'document' => 'setting_image/' . $imageName,
                'collection_name' => 'setting_image',
            ]);
            Storage::put($path, $response->getBody());
// 1 -----------------------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'what_do_we_do',
                'code' =>'what_do_we_do',
                'slug' => 'what_do_we_do',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'title' => 'What Do We Do',
                    'content' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur.',
                ]);
            }
//2  -----------------------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'our_mission',
                'code' =>'our_mission',
                'slug' => 'our_mission',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'title' => 'Our Mission',
                    'content' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur.',
                ]);
            }
//  3   -----------------------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'history_of_us',
                'code' =>'history_of_us',
                'slug' => 'history_of_us',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'title' => 'History of Us',
                    'content' => 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur.',
                ]);
            }
//     -----------------------------------------------------------------------------------------------------------------------
            $setting = Setting::create([
                'name' => 'opening_hours_and_chat',
                'code' =>'opening_hours_and_chat',
                'slug' => 'opening_hours_and_chat',
            ]);
            foreach ($langs as $lang) {
                $setting->translations()->create([
                    'locale' => $lang->code,
                    'setting_id' => $setting->id,
                    'title' => 'opening hours and chat',
                    'content' => '<a class="RW">1:1 Support /&nbsp;</a>
                        <a> CS Center AM 10:00 - PM 6:00</a>'
                ]);
            }

//            $imageUrl = asset('https://annecy1.cafe24.com/web/upload/NNEditor/20240124/%ED%83%9C%EA%B7%B9%EA%B8%B0%2B%EB%AC%B4%EA%B6%81%ED%99%94.png');
//            $client = new Client();
//            $response = $client->get($imageUrl);
//
//            $imageName = pathinfo($imageUrl, PATHINFO_BASENAME);
//            $path = 'public/documents/setting_image/' . $imageName;
//            Document::create([
//                'manipulationable_type' => 'setting',
//                'manipulationable_id' => $setting->id,
//                'document' => 'setting_image/' . $imageName,
//                'collection_name' => 'setting_image',
//            ]);
//            Storage::put($path, $response->getBody());
// ---------------------------------------------------------------------------------
        });

    }
}
