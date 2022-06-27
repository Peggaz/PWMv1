<?php
//
//namespace App\Tests\Controller;
//
//use App\Repository\UserRepository;
//use App\Tests\WebBaseTestCase;
//
//
//class RegistrationControllerTest extends WebBaseTestCase
//{
//    public function setUp(): void
//    {
//        $this->httpClient = static::createClient();
//    }
//
//    /**
//     * @return void
//     */
//    public function testRegister(){
//        //given
//
//        $email = 'register_user@example.com';
//        //when
//
//        $this->httpClient->request('GET', '/register/');
//        dd($this->httpClient->submitForm(
//            "zarejestruj",
//            [
//                'registration_form' =>
//                [
//                    'email' => $email,
//                    'plainPassword' => '1234'
//                ]
//            ]
//        )
//        );
//        //then
//        $userRepository =
//            static::getContainer()->get(UserRepository::class);
//        $this->assertNotNull($userRepository->findByEmail($email));
//    }
//}
