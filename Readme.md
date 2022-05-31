# Hilbert - API

The API is not based on the Biletado-template, and is instead created from scratch.
The API fulfills the following requirements:
- Containering (docker-compose)
- CI-Pipeline using GitHub Actions
- Carefully chosen Framework (Laravel)
- Prepared Statements with Laravel Models ![unknown](https://user-images.githubusercontent.com/63658119/171256438-31842880-36bc-46c3-82bc-f35026f77dcf.png)
- Clean code
- JWT validation via Baerer Token and Middelware using Laravel Auth
- Licensing (TODO)
- Version Control (GitHub)
- Documentation(The Document you are reading right now)
- Testing (Laravel Test during build)
- Logging (Included with Laravel)
- API-Implementation (CRUD, input-validation, Correct HTTP-Status)![unknown](https://user-images.githubusercontent.com/63658119/171257916-a4aea066-7b24-467f-9eb7-eb11b35db600.png)
![unknown](https://user-images.githubusercontent.com/63658119/171258038-a5934802-47c1-463f-b1e5-24c47a2ea9b4.png)

## Containering
The two branches of this GitHub-repository contain the different versions of our API. 


### Main
The main branch requires the installation of various dependencies by following these installation steps:
(Requires php v8.0, php composer(https://getcomposer.org/), nodejs v16.15, npm v8.5.5)
![Unknown](https://user-images.githubusercontent.com/63658119/171259764-76a652a3-49f2-4599-922a-d696b1eb63d9.jpeg)

### Pre-Delivered Dependencies
The docker-compose branch of this repository contains all pre-installed dependecies necessary to run the API(tested on Ubuntu/Debian, Windows).
(Requires docker-compose on linux or docker desktop on Windows)
Steps:
- clone the docker-compose branch of this repository
- $ cd Hilbert/
- $ docker-compose up
