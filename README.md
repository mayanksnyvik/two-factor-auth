Laravel Two Factor Authentication  package

After Laravel project installation 


1.first create a  folder on root directory snayvik_tech_labs.
2.Take a git clone in snayvik_tech_labs folder with this command  git clone https://github.com/mayanksnyvik/two-factor-auth.git
3. Add this code in composer json file in requre section in "mayanksnyvik/two-factor-auth": "1.0" 
4.  Add this code in composer json file after script section 
  "repositories":[
        {
           "type":"path",
            "url":"mayanksnyvik/two-factor-auth",
            "options":{
                "symlink":true
            }
        }
            
    ],

5. Run composer update command
6. Install Laravel ui/auth
7. Run command php artisan migrate
8. Update mail configuration in your .env file
9. add middleware to '2fa' to home route and home route must be there.
