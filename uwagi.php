<?php
//Dzień dobry,
//
// testy kończą się błędami: Tests: 87, Assertions: 103, Errors: 4,
//Failures: 8, Warnings: 1.
//
// to co jest związane z UserPasswordEncoder trzeba zmienić na
//UserPasswordEncoder:


//Remaining direct deprecation notices (16)
#region sda


//   9x: Since symfony/security-core 5.4: The $credentials argument of
//"Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken::__construct"
//is deprecated.
//     1x in CategoryControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in OperationControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in PaymentControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in TransactionControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in TransactionControllerTest::testCreateTransactionAdminUser
//from App\Tests\Controller
//     1x in TransactionControllerTest::testCreateTransactionNonAdmin from
//App\Tests\Controller
//     1x in WalletControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in WalletControllerTest::testCreateWalletAdminUser from
//App\Tests\Controller
//     1x in WalletControllerTest::testIndexRouteNonAuthorizedUser from
//App\Tests\Controller
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\SodiumPasswordEncoder" class is
//deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\SodiumPasswordHasher" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface" class
//is deprecated, use
//"Symfony\Component\PasswordHasher\PasswordHasherInterface" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\SelfSaltingEncoderInterface"
//interface is deprecated, use
//"Symfony\Component\PasswordHasher\LegacyPasswordHasherInterface" on
//hasher implementations that deal with salts instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\Pbkdf2PasswordEncoder" class is
//deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\Pbkdf2PasswordHasher" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\BasePasswordEncoder" class is
//deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\CheckPasswordLengthTrait" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder"
//class is deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\MessageDigestPasswordHasher"
//instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\MigratingPasswordEncoder" class
//is deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\MigratingPasswordHasher" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//Remaining indirect deprecation notices (1)
//
//   1x: The "Symfony\Bridge\Doctrine\Logger\DbalLogger" class implements
//"Doctrine\DBAL\Logging\SQLLogger" that is deprecated Use {@see
//\Doctrine\DBAL\Logging\Middleware} or implement {@see
//\Doctrine\DBAL\Driver\Middleware} instead.
//     1x in CategoryControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//
//Other deprecation notices (21)
//
//   9x: Since symfony/framework-bundle 5.3: Accessing the "session"
//service directly from the container is deprecated, use dependency
//injection instead.
//     1x in CategoryControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in OperationControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in PaymentControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in TransactionControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in TransactionControllerTest::testCreateTransactionAdminUser
//from App\Tests\Controller
//     1x in TransactionControllerTest::testCreateTransactionNonAdmin from
//App\Tests\Controller
//     1x in WalletControllerTest::testIndexRouteAnonymousUser from
//App\Tests\Controller
//     1x in WalletControllerTest::testCreateWalletAdminUser from
//App\Tests\Controller
//     1x in WalletControllerTest::testIndexRouteNonAuthorizedUser from
//App\Tests\Controller
//
//   4x: Since symfony/security-bundle 5.3: Accessing the
//"security.password_encoder" service directly from the container is
//deprecated, use dependency injection instead.
//     2x in TransactionServiceTest::testSave from App\Tests\Service
//     2x in TransactionServiceTest::testDelete from App\Tests\Service
//
//   2x: Since symfony/security-bundle 5.3: The
//".container.private.security.password_encoder" service is deprecated,
//use "security.user_password_hasher" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//     1x in TransactionServiceTest::testDelete from App\Tests\Service
//
//   2x: Since symfony/security-bundle 5.3: The
//"security.encoder_factory.generic" service is deprecated, use
//"security.password_hasher_factory" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//     1x in TransactionServiceTest::testDelete from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\UserPasswordEncoder" class is
//deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\UserPasswordEncoder" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface"
//interface is deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\UserPasswordEncoderInterface"
//instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\EncoderFactory" class is
//deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory" instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
//
//   1x: Since symfony/security-core 5.3: The
//"Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface" class
//is deprecated, use
//"Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface"
//instead.
//     1x in TransactionServiceTest::testSave from App\Tests\Service
#endregion


//dzięki temu zniknie nam ściana ostrzeżeń. Użycie
//PasswordHasherFactoryInterface ma Pan opisane w notatkach.

// wynik statycznej analizy kodu jest następujący:

#region statyczna analiza kodu
//# vendor/bin/php-cs-fixer fix src/ --dry-run --verbose
//--rules=@Symfony,@PSR1,@PSR2,@PSR12
//PHP CS Fixer 3.8.0 BerSzcz against war! by Fabien Potencier and Dariusz
//Ruminski.
//PHP runtime: 8.1.4
//Loaded config default from "/home/wwwroot/app/.php-cs-fixer.dist.php".
//Paths from configuration file have been overridden by paths provided as
//command arguments.
//FFFFFFFFFFFFFFFFF.FFF.F.FFFFFFFFF.FFFFFFFFFFFFFF.F.F..FFFFFFF 61 / 61 (100%)
//Legend: ?-unknown, I-invalid file syntax (file ignored), S-skipped
//(cached or empty file), .-no changes, F-fixed, E-error
//    1) src/Security/LoginFormAuthenticator.php (phpdoc_align)
//    2) src/Security/Voter/WalletVoter.php (braces,
//no_superfluous_phpdoc_tags, phpdoc_trim, phpdoc_align)
//    3) src/Security/Voter/TransactionVoter.php (braces,
//no_superfluous_phpdoc_tags, phpdoc_trim, phpdoc_align)
//    4) src/Service/OperationService.php (yoda_style, phpdoc_trim,
//phpdoc_align)
//    5) src/Service/PaymentServiceInterface.php
//(class_attributes_separation, phpdoc_align, single_blank_line_at_eof)
//    6) src/Service/TransactionServiceInterface.php
//(single_blank_line_at_eof)
//    7) src/Service/CategoryServiceInterface.php
//(class_attributes_separation, phpdoc_align, single_blank_line_at_eof)
//    8) src/Service/UserServiceInterface.php
//(class_attributes_separation, single_blank_line_at_eof)
//    9) src/Service/CategoryService.php (class_attributes_separation,
//yoda_style, phpdoc_trim, phpdoc_align)
//   10) src/Service/WalletService.php (no_superfluous_phpdoc_tags,
//yoda_style, phpdoc_separation, phpdoc_trim, blank_line_before_statement,
//phpdoc_align)
//   11) src/Service/UserService.php (yoda_style, phpdoc_trim)
//   12) src/Service/TransactionService.php (class_attributes_separation,
//blank_line_before_statement, phpdoc_align)
//   13) src/Service/PaymentService.php (yoda_style, phpdoc_trim,
//phpdoc_align)
//   14) src/Service/TagServiceInterface.php (class_attributes_separation,
//single_blank_line_at_eof)
//   15) src/Service/OperationServiceInterface.php
//(class_attributes_separation, phpdoc_align, single_blank_line_at_eof)
//   16) src/Service/WalletServiceInterface.php
//(class_attributes_separation, no_superfluous_phpdoc_tags,
//phpdoc_separation, single_blank_line_at_eof)
//   17) src/Service/TagService.php (yoda_style, phpdoc_separation,
//phpdoc_align)
//   18) src/Form/Type/CategoryType.php (no_superfluous_phpdoc_tags,
//phpdoc_trim)
//   19) src/Form/Type/PaymentType.php (method_argument_space,
//no_superfluous_phpdoc_tags, phpdoc_trim)
//   20) src/Form/Type/UserType.php (method_argument_space,
//no_superfluous_phpdoc_tags, trailing_comma_in_multiline, phpdoc_trim,
//no_unused_imports)
//   21) src/Form/Type/TransactionType.php (class_attributes_separation,
//no_superfluous_phpdoc_tags, no_blank_lines_after_class_opening,
//phpdoc_trim, no_extra_blank_lines)
//   22) src/Form/Type/WalletType.php (no_superfluous_phpdoc_tags,
//phpdoc_trim, no_unused_imports)
//   23) src/Form/Type/OperationType.php (method_argument_space,
//no_superfluous_phpdoc_tags, phpdoc_trim)
//   24) src/Controller/WalletController.php (class_attributes_separation,
//braces, no_superfluous_phpdoc_tags, single_line_comment_spacing,
//no_blank_lines_after_class_opening, phpdoc_trim,
//single_line_comment_style, phpdoc_align)
//   25) src/Controller/OperationController.php
//(class_attributes_separation, braces, no_superfluous_phpdoc_tags,
//single_line_comment_spacing, phpdoc_trim, single_line_comment_style,
//phpdoc_align)
//   26) src/Controller/PaymentController.php
//(class_attributes_separation, braces, no_superfluous_phpdoc_tags,
//single_line_comment_spacing, phpdoc_trim, single_line_comment_style,
//phpdoc_align)
//   27) src/Controller/RegistrationController.php (braces,
//function_typehint_space)
//   28) src/Controller/SearchController.php (braces,
//method_argument_space, no_superfluous_phpdoc_tags,
//single_line_comment_spacing, single_quote, trailing_comma_in_multiline,
//phpdoc_trim, single_line_comment_style, phpdoc_align,
//single_blank_line_at_eof)
//   29) src/Controller/TagController.php (no_empty_phpdoc, concat_space,
//no_trailing_comma_in_singleline_array, no_whitespace_in_blank_line,
//no_extra_blank_lines)
//   30) src/Controller/CategoryController.php
//(class_attributes_separation, braces, no_superfluous_phpdoc_tags,
//single_line_comment_spacing, phpdoc_trim, single_line_comment_style,
//phpdoc_align)
//   31) src/Controller/TransactionController.php (braces,
//method_argument_space, phpdoc_align)
//   32) src/Controller/UserController.php (class_attributes_separation,
//method_argument_space, no_superfluous_phpdoc_tags,
//single_line_comment_spacing, single_quote, trailing_comma_in_multiline,
//no_blank_lines_after_class_opening, phpdoc_trim, no_extra_blank_lines,
//single_line_comment_style, phpdoc_align)
//   33) src/Entity/Enum/UserRole.php (class_attributes_separation,
//elseif, braces, single_quote, yoda_style, no_extra_blank_lines)
//   34) src/Entity/User.php (class_attributes_separation,
//no_superfluous_phpdoc_tags, single_line_comment_spacing, phpdoc_trim,
//cast_spaces, single_line_comment_style,
//phpdoc_trim_consecutive_blank_line_separation)
//   35) src/Entity/Category.php (no_superfluous_phpdoc_tags, phpdoc_trim,
//phpdoc_trim_consecutive_blank_line_separation)
//   36) src/Entity/Payment.php (class_attributes_separation,
//no_superfluous_phpdoc_tags, phpdoc_trim,
//phpdoc_trim_consecutive_blank_line_separation)
//   37) src/Entity/Transaction.php (class_attributes_separation,
//no_superfluous_phpdoc_tags, single_line_comment_spacing, phpdoc_trim,
//no_extra_blank_lines, blank_line_before_statement,
//single_line_comment_style, phpdoc_trim_consecutive_blank_line_separation)
//   38) src/Entity/Operation.php (class_attributes_separation,
//no_superfluous_phpdoc_tags, phpdoc_trim,
//phpdoc_trim_consecutive_blank_line_separation)
//   39) src/Entity/Tag.php (class_attributes_separation, braces,
//no_superfluous_phpdoc_tags, single_line_comment_spacing, phpdoc_trim,
//single_line_comment_style, phpdoc_trim_consecutive_blank_line_separation)
//   40) src/Entity/Wallet.php (class_attributes_separation,
//no_superfluous_phpdoc_tags, phpdoc_trim, no_extra_blank_lines,
//phpdoc_trim_consecutive_blank_line_separation)
//   41) src/DataFixtures/AppFixtures.php (no_superfluous_phpdoc_tags,
//phpdoc_summary, phpdoc_trim)
//   42) src/DataFixtures/CategoryFixtures.php (single_blank_line_at_eof)
//   43) src/DataFixtures/AbstractBaseFixtures.php
//(no_superfluous_phpdoc_tags, phpdoc_trim)
//   44) src/DataFixtures/PaymentFixtures.php (single_blank_line_at_eof)
//   45) src/DataFixtures/TagFixtures.php (blank_line_before_statement)
//   46) src/DataFixtures/UserFixtures.php (class_attributes_separation,
//no_blank_lines_after_class_opening, phpdoc_trim,
//blank_line_before_statement)
//   47) src/Repository/CategoryRepository.php
//(no_superfluous_phpdoc_tags, concat_space, blank_line_before_statement,
//phpdoc_trim_consecutive_blank_line_separation)
//   48) src/Repository/OperationRepository.php
//(no_superfluous_phpdoc_tags, concat_space, blank_line_before_statement,
//phpdoc_trim_consecutive_blank_line_separation)
//   49) src/Repository/WalletRepository.php (class_attributes_separation,
//braces, no_superfluous_phpdoc_tags, no_empty_phpdoc,
//no_whitespace_in_blank_line, no_extra_blank_lines)
//   50) src/Repository/TransactionRepository.php
//(class_attributes_separation)
//   51) src/Repository/PaymentRepository.php (no_superfluous_phpdoc_tags,
//concat_space, blank_line_before_statement,
//phpdoc_trim_consecutive_blank_line_separation)
//   52) src/Repository/UserRepository.php (no_empty_phpdoc,
//no_whitespace_in_blank_line, no_extra_blank_lines)
//   53) src/Repository/TagRepository.php (class_attributes_separation,
//no_empty_phpdoc, phpdoc_separation, no_whitespace_in_blank_line,
//no_extra_blank_lines)
//
//Checked all files in 1.775 seconds, 16.000 MB memory used
//
//Jeżeli potrzebuje Pan dokładniejszego sprawdzenia, a nie chce Pan
//przeglądać plik po pliku w PhpStorm, polecam instalację php_codesniffer:
//
//composer require --dev squizlabs/php_codesniffer
//composer require --dev escapestudios/symfony2-coding-standard
//vendor/bin/phpcs --config-set installed_paths $(realpath
//vendor/escapestudios/symfony2-coding-standard)
//vendor/bin/phpcs --config-set default_standard Symfony
//
//Sprawdzenie odpalamy poleceniem: vendor/bin/phpcs --standard=Symfony src/
//
//PHP_CodeSniffer potrafi też sam poprawić podstawowe błędy za pomocą PHP
//Code Biutiffera poleceniem:  vendor/bin/phpcbf --standard=Symfony src/
//
//Wynik statycznej analizy kodu za pomocą PHP_CodeSniffera wygląda
//następująco:
//
//# vendor/bin/phpcs --standard=Symfony src/
//
//FILE: /home/wwwroot/app/src/Security/LoginFormAuthenticator.php
//---------------------------------------------------------------------------------------------
//FOUND 8 ERRORS AFFECTING 6 LINES
//---------------------------------------------------------------------------------------------
//   49 | ERROR | [ ] Doc comment for parameter "$urlGenerator" missing
//   57 | ERROR | [ ] Doc comment for parameter "$request" missing
//   96 | ERROR | [x] Expected 8 spaces after parameter type; 1 found
//   96 | ERROR | [x] Expected 6 spaces after parameter name; 1 found
//   97 | ERROR | [x] Expected 8 spaces after parameter name; 1 found
//   98 | ERROR | [x] Expected 9 spaces after parameter type; 1 found
//  125 | ERROR | [ ] Declare public methods first,then protected ones and
//finally private ones
//  125 | ERROR | [ ] Missing doc comment for function supports()
//---------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 4 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Security/Voter/WalletVoter.php
//------------------------------------------------------------------------------------------------------------------------
//FOUND 13 ERRORS AFFECTING 8 LINES
//------------------------------------------------------------------------------------------------------------------------
//   63 | ERROR | [x] Expected 2 spaces after parameter type; 1 found
//   63 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//   77 | ERROR | [x] Expected 9 spaces after parameter type; 1 found
//   78 | ERROR | [x] Expected 10 spaces after parameter type; 1 found
//   78 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//   79 | ERROR | [x] Expected 5 spaces after parameter name; 1 found
//   97 | ERROR | [x] Function closing brace must go on the next line
//following the body; found 1 blank lines before brace
//  103 | ERROR | [x] Expected 3 spaces after parameter type; 1 found
//  103 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//  117 | ERROR | [x] Expected 3 spaces after parameter type; 1 found
//  117 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//  131 | ERROR | [x] Expected 3 spaces after parameter type; 1 found
//  131 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 13 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Security/Voter/TransactionVoter.php
//------------------------------------------------------------------------------------------------------------------------
//FOUND 13 ERRORS AFFECTING 8 LINES
//------------------------------------------------------------------------------------------------------------------------
//   63 | ERROR | [x] Expected 2 spaces after parameter type; 1 found
//   63 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//   77 | ERROR | [x] Expected 9 spaces after parameter type; 1 found
//   78 | ERROR | [x] Expected 10 spaces after parameter type; 1 found
//   78 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//   79 | ERROR | [x] Expected 5 spaces after parameter name; 1 found
//   97 | ERROR | [x] Function closing brace must go on the next line
//following the body; found 1 blank lines before brace
//  103 | ERROR | [x] Expected 8 spaces after parameter type; 1 found
//  103 | ERROR | [x] Expected 8 spaces after parameter name; 1 found
//  117 | ERROR | [x] Expected 8 spaces after parameter type; 1 found
//  117 | ERROR | [x] Expected 8 spaces after parameter name; 1 found
//  131 | ERROR | [x] Expected 8 spaces after parameter type; 1 found
//  131 | ERROR | [x] Expected 8 spaces after parameter name; 1 found
//------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 13 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/OperationService.php
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 5 ERRORS AND 2 WARNINGS AFFECTING 5 LINES
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//  35 | ERROR   | [x] Expected 2 spaces after parameter type; 1 found
//  35 | ERROR   | [x] Expected 11 spaces after parameter name; 1 found
//  46 | ERROR   | [x] Expected 9 spaces after parameter type; 1 found
//  53 | ERROR   | [ ] Use Yoda conditions when checking a variable
//against an expression to avoid an accidental assignment inside the
//condition statement.
//  53 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//  54 | ERROR   | [ ] Do not use else, elseif, break after if and case
//conditions which return or throw something
//  75 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/PaymentServiceInterface.php
//----------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AFFECTING 2 LINES
//----------------------------------------------------------------------------------------------
//  20 | ERROR | [x] Expected 9 spaces after parameter type; 1 found
//  34 | ERROR | [x] Expected 1 newline at end of file; 0 found
//  34 | ERROR | [x] The closing brace for the interface must go on the
//next line after the body
//----------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/TransactionServiceInterface.php
//----------------------------------------------------------------------
//FOUND 2 ERRORS AFFECTING 2 LINES
//----------------------------------------------------------------------
//  17 | ERROR | [ ] Doc comment for parameter "$author" missing
//  39 | ERROR | [x] Expected 1 newline at end of file; 0 found
//----------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/CategoryServiceInterface.php
//----------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AFFECTING 2 LINES
//----------------------------------------------------------------------------------------------
//  20 | ERROR | [x] Expected 9 spaces after parameter type; 1 found
//  34 | ERROR | [x] Expected 1 newline at end of file; 0 found
//  34 | ERROR | [x] The closing brace for the interface must go on the
//next line after the body
//----------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/UserServiceInterface.php
//----------------------------------------------------------------------------------------------
//FOUND 2 ERRORS AFFECTING 1 LINE
//----------------------------------------------------------------------------------------------
//  32 | ERROR | [x] Expected 1 newline at end of file; 0 found
//  32 | ERROR | [x] The closing brace for the interface must go on the
//next line after the body
//----------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/CategoryService.php
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 5 ERRORS AND 2 WARNINGS AFFECTING 6 LINES
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//   34 | ERROR   | [x] Expected 10 spaces after parameter name; 1 found
//   45 | ERROR   | [x] Expected 9 spaces after parameter type; 1 found
//   52 | ERROR   | [ ] Use Yoda conditions when checking a variable
//against an expression to avoid an accidental assignment inside the
//condition statement.
//   52 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//   53 | ERROR   | [ ] Do not use else, elseif, break after if and case
//conditions which return or throw something
//   74 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//  107 | ERROR   | [x] The closing brace for the class must go on the
//next line after the body
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/WalletService.php
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 5 ERRORS AND 1 WARNING AFFECTING 6 LINES
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//  35 | ERROR   | [x] Expected 3 spaces after parameter type; 5 found
//  36 | ERROR   | [x] Expected 8 spaces after parameter name; 6 found
//  47 | ERROR   | [x] Expected 2 spaces after parameter type; 1 found
//  48 | ERROR   | [x] Group annotations together so that annotations of
//the same type immediately follow each other, and annotations of a
//different type are separated by a single blank line
//  60 | ERROR   | [x] Missing blank line before return statement
//  74 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 5 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/UserService.php
//------------------------------------------------------------------------------
//FOUND 0 ERRORS AND 1 WARNING AFFECTING 1 LINE
//------------------------------------------------------------------------------
//  64 | WARNING | Always use identical comparison unless you need type
//juggling
//------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/TransactionService.php
//--------------------------------------------------------------------------------------------
//FOUND 6 ERRORS AND 1 WARNING AFFECTING 5 LINES
//--------------------------------------------------------------------------------------------
//  35 | ERROR   | [x] Expected 4 spaces after parameter type; 1 found
//  35 | ERROR   | [x] Expected 13 spaces after parameter name; 1 found
//  46 | ERROR   | [x] Expected 2 spaces after parameter type; 1 found
//  46 | ERROR   | [x] Expected 3 spaces after parameter name; 1 found
//  60 | ERROR   | [x] Missing blank line before return statement
//  74 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//  93 | ERROR   | [x] The closing brace for the class must go on the next
//line after the body
//--------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 6 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//--------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/PaymentService.php
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 5 ERRORS AND 2 WARNINGS AFFECTING 6 LINES
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//  34 | ERROR   | [x] Expected 2 spaces after parameter type; 1 found
//  35 | ERROR   | [x] Expected 9 spaces after parameter name; 1 found
//  46 | ERROR   | [x] Expected 9 spaces after parameter type; 1 found
//  53 | ERROR   | [ ] Use Yoda conditions when checking a variable
//against an expression to avoid an accidental assignment inside the
//condition statement.
//  53 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//  54 | ERROR   | [ ] Do not use else, elseif, break after if and case
//conditions which return or throw something
//  75 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/TagServiceInterface.php
//----------------------------------------------------------------------------------------------
//FOUND 2 ERRORS AFFECTING 1 LINE
//----------------------------------------------------------------------------------------------
//  41 | ERROR | [x] Expected 1 newline at end of file; 0 found
//  41 | ERROR | [x] The closing brace for the interface must go on the
//next line after the body
//----------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/OperationServiceInterface.php
//----------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AFFECTING 2 LINES
//----------------------------------------------------------------------------------------------
//  20 | ERROR | [x] Expected 9 spaces after parameter type; 1 found
//  34 | ERROR | [x] Expected 1 newline at end of file; 0 found
//  34 | ERROR | [x] The closing brace for the interface must go on the
//next line after the body
//----------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/WalletServiceInterface.php
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 4 ERRORS AFFECTING 3 LINES
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//  20 | ERROR | [x] Expected 2 spaces after parameter type; 1 found
//  21 | ERROR | [x] Group annotations together so that annotations of the
//same type immediately follow each other, and annotations of a different
//type are separated by a single blank line
//  33 | ERROR | [x] Expected 1 newline at end of file; 0 found
//  33 | ERROR | [x] The closing brace for the interface must go on the
//next line after the body
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 4 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Service/TagService.php
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AND 1 WARNING AFFECTING 4 LINES
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//  33 | ERROR   | [x] Expected 6 spaces after parameter type; 1 found
//  34 | ERROR   | [x] Expected 5 spaces after parameter name; 1 found
//  65 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//  88 | ERROR   | [x] Group annotations together so that annotations of
//the same type immediately follow each other, and annotations of a
//different type are separated by a single blank line
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/DataTransformer/TagsDataTransformer.php
//------------------------------------------------------------------------------
//FOUND 0 ERRORS AND 1 WARNING AFFECTING 1 LINE
//------------------------------------------------------------------------------
//  73 | WARNING | Always use identical comparison unless you need type
//juggling
//------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/CategoryType.php
//----------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AFFECTING 3 LINES
//----------------------------------------------------------------------------------------------
//  19 | ERROR | Doc comment for parameter "$builder" missing
//  25 | ERROR | Doc comment for parameter $options does not match actual
//variable name $builder
//  42 | ERROR | Doc comment for parameter "$resolver" missing
//----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/PaymentType.php
//--------------------------------------------------------------------------------------------------
//FOUND 6 ERRORS AFFECTING 4 LINES
//--------------------------------------------------------------------------------------------------
//  19 | ERROR | [ ] Doc comment for parameter "$builder" missing
//  25 | ERROR | [ ] Doc comment for parameter $options does not match
//actual variable name $builder
//  38 | ERROR | [x] Multi-line function call not indented correctly;
//expected 8 spaces but found 12
//  38 | ERROR | [x] Multi-line function call not indented correctly;
//expected 8 spaces but found 12
//  38 | ERROR | [x] Closing parenthesis of a multi-line function call
//must be on a line by itself
//  41 | ERROR | [ ] Doc comment for parameter "$resolver" missing
//--------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//--------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/UserType.php
//--------------------------------------------------------------------------------------------------
//FOUND 6 ERRORS AFFECTING 6 LINES
//--------------------------------------------------------------------------------------------------
//  28 | ERROR | [ ] Doc comment for parameter "$builder" missing
//  34 | ERROR | [ ] Doc comment for parameter $options does not match
//actual variable name $builder
//  60 | ERROR | [x] Add a comma after each item in a multi-line array
//  63 | ERROR | [x] Multi-line function call not indented correctly;
//expected 12 spaces but found 8
//  64 | ERROR | [x] Expected 0 spaces before closing parenthesis; newline
//found
//  67 | ERROR | [ ] Doc comment for parameter "$resolver" missing
//--------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//--------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/TagType.php
//-----------------------------------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AND 1 WARNING AFFECTING 4 LINES
//-----------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | The license block has to be present at the top
//     |         |                 of every PHP file, before the namespace
//  10 | ERROR   | Missing doc comment for class TagType
//  12 | ERROR   | Missing doc comment for function buildForm()
//  20 | ERROR   | Missing doc comment for function configureOptions()
//-----------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/TransactionType.php
//-----------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AFFECTING 3 LINES
//-----------------------------------------------------------------------------------------------
//   45 | ERROR | Doc comment for parameter "$builder" missing
//   51 | ERROR | Doc comment for parameter $options does not match actual
//variable name $builder
//  143 | ERROR | Doc comment for parameter "$resolver" missing
//-----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/RegistrationFormType.php
//-----------------------------------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AND 1 WARNING AFFECTING 4 LINES
//-----------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | The license block has to be present at the top
//     |         |                 of every PHP file, before the namespace
//  15 | ERROR   | Missing doc comment for class RegistrationFormType
//  17 | ERROR   | Missing doc comment for function buildForm()
//  48 | ERROR   | Missing doc comment for function configureOptions()
//-----------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/WalletType.php
//----------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AFFECTING 3 LINES
//----------------------------------------------------------------------------------------------
//  23 | ERROR | Doc comment for parameter "$builder" missing
//  29 | ERROR | Doc comment for parameter $options does not match actual
//variable name $builder
//  54 | ERROR | Doc comment for parameter "$resolver" missing
//----------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Form/Type/OperationType.php
//--------------------------------------------------------------------------------------------------
//FOUND 6 ERRORS AFFECTING 4 LINES
//--------------------------------------------------------------------------------------------------
//  19 | ERROR | [ ] Doc comment for parameter "$builder" missing
//  25 | ERROR | [ ] Doc comment for parameter $options does not match
//actual variable name $builder
//  38 | ERROR | [x] Multi-line function call not indented correctly;
//expected 8 spaces but found 12
//  38 | ERROR | [x] Multi-line function call not indented correctly;
//expected 8 spaces but found 12
//  38 | ERROR | [x] Closing parenthesis of a multi-line function call
//must be on a line by itself
//  41 | ERROR | [ ] Doc comment for parameter "$resolver" missing
//--------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//--------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/WalletController.php
//------------------------------------------------------------------------------------------------------
//FOUND 15 ERRORS AFFECTING 10 LINES
//------------------------------------------------------------------------------------------------------
//   40 | ERROR | [ ] Doc comment for parameter "$walletService" missing
//   40 | ERROR | [ ] Doc comment for parameter "$translator" missing
//   53 | ERROR | [x] Expected 10 spaces after parameter name; 8 found
//   54 | ERROR | [x] Expected 3 spaces after parameter type; 5 found
//   54 | ERROR | [ ] Superfluous parameter comment
//   55 | ERROR | [ ] Superfluous parameter comment
//   55 | ERROR | [x] Expected 8 spaces after parameter name; 6 found
//  131 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  137 | ERROR | [x] Expected 2 spaces after parameter type; 1 found
//  137 | ERROR | [x] Expected 2 spaces after parameter name; 1 found
//  170 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  172 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  177 | ERROR | [x] Expected 2 spaces after parameter type; 1 found
//  177 | ERROR | [x] Expected 2 spaces after parameter name; 1 found
//  210 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 11 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/OperationController.php
//------------------------------------------------------------------------------------------------------
//FOUND 17 ERRORS AFFECTING 14 LINES
//------------------------------------------------------------------------------------------------------
//   40 | ERROR | [x] Expected 7 spaces after parameter type; 1 found
//   40 | ERROR | [x] Expected 2 spaces after parameter name; 1 found
//   48 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   66 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   67 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   85 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   86 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  121 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  122 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  126 | ERROR | [x] Expected 3 spaces after parameter type; 1 found
//  126 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//  159 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  161 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  165 | ERROR | [x] Expected 3 spaces after parameter type; 1 found
//  165 | ERROR | [x] Expected 3 spaces after parameter name; 1 found
//  198 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  200 | ERROR | [x] The closing brace for the class must go on the next
//line after the body
//------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 17 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/PaymentController.php
//------------------------------------------------------------------------------------------------------
//FOUND 13 ERRORS AFFECTING 12 LINES
//------------------------------------------------------------------------------------------------------
//   40 | ERROR | [x] Expected 5 spaces after parameter type; 1 found
//   40 | ERROR | [x] Expected 2 spaces after parameter name; 1 found
//   48 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   66 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   67 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   85 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   86 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  121 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  122 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  159 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  161 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  198 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  200 | ERROR | [x] The closing brace for the class must go on the next
//line after the body
//------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 13 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/RegistrationController.php
//------------------------------------------------------------------------------------------------------------------------------------
//FOUND 4 ERRORS AND 1 WARNING AFFECTING 4 LINES
//------------------------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | [ ] The license block has to be present at the top
//     |         |                     of every PHP file, before the namespace
//  17 | ERROR   | [ ] Missing doc comment for class RegistrationController
//  20 | ERROR   | [ ] Missing doc comment for function register()
//  20 | ERROR   | [ ] Declare all the arguments on the same line as the
//method/function name, no matter how many arguments there are.
//  27 | ERROR   | [x] The closing parenthesis and the opening brace of a
//multi-line function declaration must be on the same line
//------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/SearchController.php
//---------------------------------------------------------------------------------------------------------------------------
//FOUND 17 ERRORS AND 1 WARNING AFFECTING 16 LINES
//---------------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | [ ] The license block has to be present at the top
//     |         |                     of every PHP file, before the namespace
//  14 | ERROR   | [ ] Missing doc comment for class SearchController
//  33 | ERROR   | [x] Expected 2 spaces after parameter type; 1 found
//  33 | ERROR   | [x] Expected 2 spaces after parameter name; 1 found
//  34 | ERROR   | [x] Expected 3 spaces after parameter type; 1 found
//  36 | ERROR   | [x] Expected 7 spaces after parameter type; 1 found
//  36 | ERROR   | [x] Expected 3 spaces after parameter name; 1 found
//  46 | ERROR   | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  59 | ERROR   | [ ] Variable "category_pagination" is not in valid
//camel caps format
//  63 | ERROR   | [ ] Variable "payment_pagination" is not in valid camel
//caps format
//  67 | ERROR   | [ ] Variable "operation_pagination" is not in valid
//camel caps format
//  72 | ERROR   | [x] Opening parenthesis of a multi-line function call
//must be the last content on the line
//  73 | ERROR   | [x] Add a comma after each item in a multi-line array
//  75 | ERROR   | [ ] Variable "category_pagination" is not in valid
//camel caps format
//  76 | ERROR   | [ ] Variable "payment_pagination" is not in valid camel
//caps format
//  77 | ERROR   | [ ] Variable "operation_pagination" is not in valid
//camel caps format
//  81 | ERROR   | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  82 | ERROR   | [x] Expected 1 newline at end of file; 0 found
//---------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 10 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/TagController.php
//---------------------------------------------------------------------------------------------------------------------------
//FOUND 16 ERRORS AND 1 WARNING AFFECTING 12 LINES
//---------------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | [ ] The license block has to be present at the top
//     |         |                     of every PHP file, before the namespace
//  14 | ERROR   | [ ] Missing doc comment for class TagController
//  17 | ERROR   | [ ] Missing doc comment for function index()
//  24 | ERROR   | [ ] Doc comment for parameter "$request" missing
//  24 | ERROR   | [ ] Doc comment for parameter "$tagRepository" missing
//  25 | ERROR   | [ ] Missing @return tag in function comment
//  46 | ERROR   | [ ] Missing doc comment for function show()
//  48 | ERROR   | [x] Add a single space after each comma delimiter
//  51 | ERROR   | [ ] Doc comment for parameter "$request" missing
//  51 | ERROR   | [ ] Doc comment for parameter "$tag" missing
//  51 | ERROR   | [ ] Doc comment for parameter "$tagRepository" missing
//  52 | ERROR   | [ ] Missing @return tag in function comment
//  71 | ERROR   | [ ] Doc comment for parameter "$request" missing
//  71 | ERROR   | [ ] Doc comment for parameter "$tag" missing
//  71 | ERROR   | [ ] Doc comment for parameter "$tagRepository" missing
//  72 | ERROR   | [ ] Missing @return tag in function comment
//  76 | ERROR   | [x] Concat operator must not be surrounded by spaces
//---------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/CategoryController.php
//------------------------------------------------------------------------------------------------------
//FOUND 17 ERRORS AFFECTING 14 LINES
//------------------------------------------------------------------------------------------------------
//   40 | ERROR | [x] Expected 6 spaces after parameter type; 1 found
//   40 | ERROR | [x] Expected 2 spaces after parameter name; 1 found
//   48 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   66 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   67 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   85 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//   86 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  121 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  122 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  126 | ERROR | [x] Expected 2 spaces after parameter type; 1 found
//  126 | ERROR | [x] Expected 2 spaces after parameter name; 1 found
//  159 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  161 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  165 | ERROR | [x] Expected 2 spaces after parameter type; 1 found
//  165 | ERROR | [x] Expected 2 spaces after parameter name; 1 found
//  198 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  200 | ERROR | [x] The closing brace for the class must go on the next
//line after the body
//------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 17 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/SecurityController.php
//-----------------------------------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AND 1 WARNING AFFECTING 4 LINES
//-----------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | The license block has to be present at the top
//     |         |                 of every PHP file, before the namespace
//  11 | ERROR   | Missing doc comment for class SecurityController
//  14 | ERROR   | Missing doc comment for function login()
//  29 | ERROR   | Missing doc comment for function logout()
//-----------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/TransactionController.php
//----------------------------------------------------------------------
//FOUND 8 ERRORS AFFECTING 4 LINES
//----------------------------------------------------------------------
//   39 | ERROR | [x] Expected 9 spaces after parameter type; 1 found
//   39 | ERROR | [x] Expected 9 spaces after parameter name; 1 found
//   86 | ERROR | [x] No space found after comma in argument list
//   86 | ERROR | [x] Add a single space after each comma delimiter
//  119 | ERROR | [x] Expected 5 spaces after parameter type; 1 found
//  119 | ERROR | [x] Expected 5 spaces after parameter name; 1 found
//  155 | ERROR | [x] Expected 5 spaces after parameter type; 1 found
//  155 | ERROR | [x] Expected 5 spaces after parameter name; 1 found
//----------------------------------------------------------------------
//PHPCBF CAN FIX THE 8 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Controller/UserController.php
//----------------------------------------------------------------------------------------------------------
//FOUND 19 ERRORS AFFECTING 12 LINES
//----------------------------------------------------------------------------------------------------------
//   47 | ERROR | [ ] Doc comment for parameter "$userService" missing
//   47 | ERROR | [ ] Doc comment for parameter "$passwordHarsher" missing
//   60 | ERROR | [x] Expected 1 spaces after parameter type; 12 found
//   60 | ERROR | [x] Expected 1 spaces after parameter name; 8 found
//   94 | ERROR | [x] Add a comma after each item in a multi-line array
//  141 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  147 | ERROR | [x] Expected 4 spaces after parameter type; 1 found
//  147 | ERROR | [x] Expected 4 spaces after parameter name; 1 found
//  156 | ERROR | [x] Only one argument is allowed per line in a
//multi-line function call
//  156 | ERROR | [x] Only one argument is allowed per line in a
//multi-line function call
//  158 | ERROR | [x] Opening parenthesis of a multi-line function call
//must be the last content on the line
//  159 | ERROR | [x] Multi-line function call not indented correctly;
//expected 16 spaces but found 20
//  159 | ERROR | [x] Multi-line function call not indented correctly;
//expected 16 spaces but found 20
//  159 | ERROR | [x] Closing parenthesis of a multi-line function call
//must be on a line by itself
//  187 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  189 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  194 | ERROR | [x] Expected 4 spaces after parameter type; 1 found
//  194 | ERROR | [x] Expected 4 spaces after parameter name; 1 found
//  226 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//----------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 17 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/Enum/UserRole.php
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 7 ERRORS AND 3 WARNINGS AFFECTING 5 LINES
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//  16 | ERROR   | [ ] Missing doc comment for function labelOne()
//  18 | ERROR   | [ ] Use Yoda conditions when checking a variable
//against an expression to avoid an accidental assignment inside the
//condition statement.
//  18 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//  18 | ERROR   | [x] Expected 1 space(s) after closing parenthesis;
//found newline
//  20 | ERROR   | [ ] Do not use else, elseif, break after if and case
//conditions which return or throw something
//  21 | WARNING | [x] Usage of ELSE IF is discouraged; use ELSEIF instead
//  21 | ERROR   | [ ] Use Yoda conditions when checking a variable
//against an expression to avoid an accidental assignment inside the
//condition statement.
//  21 | WARNING | [ ] Always use identical comparison unless you need
//type juggling
//  21 | ERROR   | [x] Expected 1 space(s) after closing parenthesis;
//found newline
//  43 | ERROR   | [x] The closing brace for the enum must go on the next
//line after the body
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 4 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/User.php
//------------------------------------------------------------------------------------------------------
//FOUND 9 ERRORS AFFECTING 9 LINES
//------------------------------------------------------------------------------------------------------
//   70 | ERROR | [ ] Missing doc comment for function __construct()
//  106 | ERROR | [ ] Missing @return tag in function comment
//  109 | ERROR | [x] Expected 1 space(s) after cast statement; 0 found
//  113 | ERROR | [ ] Missing @return tag in function comment
//  116 | ERROR | [x] Expected 1 space(s) after cast statement; 0 found
//  167 | ERROR | [ ] Missing @return tag in function comment
//  182 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  228 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  230 | ERROR | [ ] You must use "/**" style comments for a function comment
//------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 4 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/Category.php
//----------------------------------------------------------------------
//FOUND 1 ERROR AFFECTING 1 LINE
//----------------------------------------------------------------------
//  164 | ERROR | Missing doc comment for function __toString()
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/Payment.php
//----------------------------------------------------------------------
//FOUND 1 ERROR AFFECTING 1 LINE
//----------------------------------------------------------------------
//  160 | ERROR | Missing doc comment for function __toString()
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/Transaction.php
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 19 ERRORS AFFECTING 19 LINES
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//  154 | ERROR | [x] Group annotations together so that annotations of
//the same type immediately follow each other, and annotations of a
//different type are separated by a single blank line
//  179 | ERROR | [x] Missing blank line before return statement
//  181 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  206 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  207 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  231 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  232 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  253 | ERROR | [x] Missing blank line before return statement
//  255 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  256 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  304 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  315 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  316 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  403 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  438 | ERROR | [ ] Missing doc comment for function addTag()
//  447 | ERROR | [ ] Missing doc comment for function removeTag()
//  454 | ERROR | [ ] Missing doc comment for function getAuthor()
//  459 | ERROR | [ ] Missing doc comment for function setAuthor()
//  466 | ERROR | [x] The closing brace for the class must go on the next
//line after the body
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 15 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/Operation.php
//----------------------------------------------------------------------
//FOUND 1 ERROR AFFECTING 1 LINE
//----------------------------------------------------------------------
//  161 | ERROR | Missing doc comment for function __toString()
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/Tag.php
//------------------------------------------------------------------------------------------------------
//FOUND 3 ERRORS AFFECTING 3 LINES
//------------------------------------------------------------------------------------------------------
//  112 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  162 | ERROR | [x] Perl-style comments are not allowed. Use "//
//Comment." or "/* comment */" instead.
//  164 | ERROR | [ ] You must use "/**" style comments for a function comment
//------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Entity/Wallet.php
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 4 ERRORS AFFECTING 4 LINES
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   56 | ERROR | [x] Group annotations together so that annotations of
//the same type immediately follow each other, and annotations of a
//different type are separated by a single blank line
//  202 | ERROR | [ ] Missing doc comment for function getUser()
//  207 | ERROR | [ ] Missing doc comment for function setUser()
//  214 | ERROR | [ ] Missing doc comment for function __toString()
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/DataFixtures/CategoryFixtures.php
//----------------------------------------------------------------------
//FOUND 1 ERROR AFFECTING 1 LINE
//----------------------------------------------------------------------
//  34 | ERROR | [x] Expected 1 newline at end of file; 0 found
//----------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/DataFixtures/PaymentFixtures.php
//----------------------------------------------------------------------
//FOUND 1 ERROR AFFECTING 1 LINE
//----------------------------------------------------------------------
//  34 | ERROR | [x] Expected 1 newline at end of file; 0 found
//----------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/DataFixtures/TagFixtures.php
//----------------------------------------------------------------------
//FOUND 1 ERROR AFFECTING 1 LINE
//----------------------------------------------------------------------
//  28 | ERROR | [x] Missing blank line before return statement
//----------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/DataFixtures/UserFixtures.php
//-----------------------------------------------------------------------
//FOUND 2 ERRORS AFFECTING 2 LINES
//-----------------------------------------------------------------------
//  25 | ERROR | [ ] Doc comment for parameter "$passwordHarsher" missing
//  69 | ERROR | [x] Missing blank line before return statement
//-----------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//-----------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Kernel.php
//----------------------------------------------------------------------------------------------------------------------
//FOUND 1 ERROR AND 1 WARNING AFFECTING 2 LINES
//----------------------------------------------------------------------------------------------------------------------
//  3 | WARNING | The license block has to be present at the top
//    |         |                 of every PHP file, before the namespace
//  8 | ERROR   | Missing doc comment for class Kernel
//----------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Repository/CategoryRepository.php
//---------------------------------------------------------------------------------------------------------------------------
//FOUND 4 ERRORS AND 1 WARNING AFFECTING 4 LINES
//---------------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | [ ] The license block has to be present at the top
//     |         |                     of every PHP file, before the namespace
//  63 | ERROR   | [x] Missing blank line before return statement
//  66 | ERROR   | [x] Concat operator must not be surrounded by spaces
//  66 | ERROR   | [x] Concat operator must not be surrounded by spaces
//  88 | ERROR   | [ ] Declare public methods first,then protected ones
//and finally private ones
//---------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Repository/OperationRepository.php
//---------------------------------------------------------------------------------------------------------------------------
//FOUND 4 ERRORS AND 1 WARNING AFFECTING 4 LINES
//---------------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | [ ] The license block has to be present at the top
//     |         |                     of every PHP file, before the namespace
//  51 | ERROR   | [x] Missing blank line before return statement
//  54 | ERROR   | [x] Concat operator must not be surrounded by spaces
//  54 | ERROR   | [x] Concat operator must not be surrounded by spaces
//  88 | ERROR   | [ ] Declare public methods first,then protected ones
//and finally private ones
//---------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Repository/WalletRepository.php
//----------------------------------------------------------------------------------------------------------------------------
//FOUND 7 ERRORS AND 1 WARNING AFFECTING 6 LINES
//----------------------------------------------------------------------------------------------------------------------------
//    3 | WARNING | [ ] The license block has to be present at the top
//      |         |                     of every PHP file, before the
//namespace
//   33 | ERROR   | [ ] Doc comment for parameter "$entity" missing
//   33 | ERROR   | [ ] Doc comment for parameter "$flush" missing
//   60 | ERROR   | [ ] Only 1 @return tag is allowed in a function comment
//   68 | ERROR   | [ ] Doc comment for parameter "$entity" missing
//   68 | ERROR   | [ ] Doc comment for parameter "$flush" missing
//   70 | ERROR   | [ ] Declare public methods first,then protected ones
//and finally private ones
//  116 | ERROR   | [x] The closing brace for the class must go on the
//next line after the body
//----------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//----------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Repository/TransactionRepository.php
//---------------------------------------------------------------------------------------------
//FOUND 2 ERRORS AFFECTING 2 LINES
//---------------------------------------------------------------------------------------------
//  179 | ERROR | [ ] Declare public methods first,then protected ones and
//finally private ones
//  188 | ERROR | [x] The closing brace for the class must go on the next
//line after the body
//---------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 1 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Repository/PaymentRepository.php
//---------------------------------------------------------------------------------------------------------------------------
//FOUND 4 ERRORS AND 1 WARNING AFFECTING 4 LINES
//---------------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | [ ] The license block has to be present at the top
//     |         |                     of every PHP file, before the namespace
//  63 | ERROR   | [x] Missing blank line before return statement
//  66 | ERROR   | [x] Concat operator must not be surrounded by spaces
//  66 | ERROR   | [x] Concat operator must not be surrounded by spaces
//  88 | ERROR   | [ ] Declare public methods first,then protected ones
//and finally private ones
//---------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 3 MARKED SNIFF VIOLATIONS AUTOMATICALLY
//---------------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Repository/UserRepository.php
//-----------------------------------------------------------------------------------------------------------------------
//FOUND 7 ERRORS AND 1 WARNING AFFECTING 6 LINES
//-----------------------------------------------------------------------------------------------------------------------
//   3 | WARNING | The license block has to be present at the top
//     |         |                 of every PHP file, before the namespace
//  31 | ERROR   | Missing doc comment for function __construct()
//  54 | ERROR   | Only 1 @return tag is allowed in a function comment
//  61 | ERROR   | Doc comment for parameter "$entity" missing
//  61 | ERROR   | Doc comment for parameter "$flush" missing
//  63 | ERROR   | Declare public methods first,then protected ones and
//finally private ones
//  71 | ERROR   | Doc comment for parameter "$entity" missing
//  71 | ERROR   | Doc comment for parameter "$flush" missing
//-----------------------------------------------------------------------------------------------------------------------
//
//
//FILE: /home/wwwroot/app/src/Repository/TagRepository.php
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//FOUND 9 ERRORS AND 1 WARNING AFFECTING 8 LINES
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    3 | WARNING | [ ] The license block has to be present at the top
//      |         |                     of every PHP file, before the
//namespace
//   32 | ERROR   | [ ] Missing doc comment for function __construct()
//   54 | ERROR   | [ ] Only 1 @return tag is allowed in a function comment
//   61 | ERROR   | [ ] Doc comment for parameter "$entity" missing
//   61 | ERROR   | [ ] Doc comment for parameter "$flush" missing
//   63 | ERROR   | [ ] Declare public methods first,then protected ones
//and finally private ones
//   71 | ERROR   | [ ] Doc comment for parameter "$entity" missing
//   71 | ERROR   | [ ] Doc comment for parameter "$flush" missing
//   86 | ERROR   | [x] Group annotations together so that annotations of
//the same type immediately follow each other, and annotations of a
//different type are separated by a single blank line
//  109 | ERROR   | [x] The closing brace for the class must go on the
//next line after the body
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//PHPCBF CAN FIX THE 2 MARKED SNIFF VIOLATIONS AUTOMATICALLY

#endregion

//Problemy dotyczą głównie stosowania komentarzy.

//odnosnie do testów, to proszę korzystać z szablonu:


// given
// when
// then

//mieszanie sekcji między sobą i wielokrotne testy w jednej metodzie nie
//są dobrą praktyką.
//
//* w metodzie wspomnianej przez Pana wyżej ma Pan co najmniej trzy osobne
//testy czyli trzy osobne metody:
//
//   * sprawdzenie zabezpieczenia ścieżki dla metody GET,
//   * wysłanie formularza metodą PUT,
//   * test metody save z repozytorium - niewłaściwe miejsce na ten test
//
//* usuwam ostrzeżenie z kodu: categoryRepository =
//static::getContainer()->get(CategoryRepository::class);
//
//* dodatkowo w kodzie:
//
//         $category = new Category();
//         $category->setName('TestCategory');
//         $category->setCreatedAt(new \DateTime('now'));
//         $category->setUpdatedAt(new \DateTime('now'));
//         $categoryRepository =
//self::$container->get(CategoryRepository::class);
//         $categoryRepository->save($category);
//
//
//         $category->setName('TestCategoryEdit');
//         $this->httpClient->request('PUT', self::TEST_ROUTE . '/' .
//$category->getId() . '/edit/',
//             ['category' =>
//                 $this->httpClient->submitForm('save', [
//                     'name' => 'TestCategoryEdit'
//                  ])
//             ]);
//         $categoryRepository->save($category);
//         $this->assertEquals('TestCategoryEdit',
//$categoryRepository->findOneById($category->getId())->getName());
//
//proszę zwrócić uwagę co się dzieje. Referencja $category cały czas
//wskazuje na ten sam obiekt w menedżerze encji (pomijam fakt, że zapis
//obiektu powinniśmy robić bezpośrednio z pominięciem repozytorium).
//Zapisujemy obiekt, następnie zmieniamy jego pole (cały czas obiekt jest
//pod kontrolą menedżera encji), następnie wysyłamy żądanie zmiany obiektu
//metodą HTTP, a potem zanim wykonamy "asercję", ponownie zapisujemy ten
//sam obiekt co na początku. Test ten nie jest poprawny. Mamy błąd:
//
//
//1) App\Tests\Controller\CategoryControllerTest::testEditCategory
//Symfony\Component\BrowserKit\Exception\BadMethodCallException: The
//"request()" method must be called before
//"Symfony\Component\BrowserKit\AbstractBrowser::submitForm()".
//
///home/wwwroot/app/vendor/symfony/browser-kit/AbstractBrowser.php:333
///home/wwwroot/app/tests/Controller/CategoryControllerTest.php:192
//
//ERRORS!
//Tests: 2, Assertions: 1, Errors: 1.
//
//Do tego de facto nie robimy testu metody kontrolera.
//
//* poniżej przykładowe testy:
//
//
public
function testEditCategoryUnauthorizedUser(): void
{
    // given
    $expectedHttpStatusCode = 302;

    $category = new Category();
    $category->setName('TestCategory');
    $category->setCreatedAt(new \DateTime('now'));
    $category->setUpdatedAt(new \DateTime('now'));
    $categoryRepository =
        static::getContainer()->get(CategoryRepository::class);
    $categoryRepository->save($category);

    // when
    $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
        $category->getId() . '/edit');
    $actual = $this->httpClient->getResponse();

    // then

    $this->assertEquals($expectedHttpStatusCode,
        $actual->getStatusCode());

}


public
function testEditCategory(): void
{
    // given
    $user = $this->createUser([UserRole::ROLE_USER->value],
        'user1@example.com');
    $this->httpClient->loginUser($user);

    $categoryRepository =
        static::getContainer()->get(CategoryRepository::class);
    $testCategory = new Category();
    $testCategory->setName('TestCategory');
    $testCategory->setCreatedAt(new \DateTime('now'));
    $testCategory->setUpdatedAt(new \DateTime('now'));
    $categoryRepository->save($testCategory);
    $testCategoryId = $testCategory->getId();
    $expectedNewCategoryName = 'TestCategoryEdit';

    $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
        $testCategoryId . '/edit');

    // when
    $this->httpClient->submitForm(
        'Edytuj',
        ['category' => ['name' => $expectedNewCategoryName]]
    );

    // then
    $savedCategory = $categoryRepository->findOneById($testCategoryId);
    $this->assertEquals($expectedNewCategoryName,
        $savedCategory->getName());
}
//
//
//* lista, kod nie działa:
//App\Service\CategoryService::getPaginatedList(): Argument #2 ($name)
//must be of type string, null given, called in
///home/wwwroot/app/src/Controller/SearchController.php on line 60
//
//* to nie jest poprawna deklaracja: public function getPaginatedList(int
//$page, string $name = Nullable::class): PaginationInterface Proszę
//sprawdzić skąd pochodzi Nullable::class Wartości null jako dopuszczalne
//deklarujemy w PHP za pomocą "?". Proszę zajrzeć do moich notatek. Po
//naprawieniu tych błędów wyszukiwarka zaczyna działać.
