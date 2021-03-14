git clone https://github.com/radhikaagr18/FileManagerLaravel.git
composer install
cp .env.example .env
php artisan migrate
php artisan key:generate
Then you can register, login and start using the file manager.
"Folder maintained-.storage/app/uploads"
