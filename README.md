# Chat-Application
A chat application That allows users to send and receive messages , and also carry out CRUD operations
**README.md**

# Chat Application

This is a web-based chat application that allows users to send and receive messages in real-time.

## Features

* **User Accounts:** Create and manage user accounts.
* **Real-time Chat:** Send and receive messages instantly with other users.
* **Online/Offline Status:** See the online status of other users.
* **Message History:** View and search through past conversations.
* **CRUD Operations:** Perform basic CRUD operations on user data and messages.

## Technologies Used

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL (XAMPP)
* **Chat API:** [Websockets API]

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/borisobi/Chat-Application.git
   ```
2. **Set Up XAMPP:**
   - Install XAMPP and configure it to run a local web server.
3. **Database Setup:**
   - Import the provided SQL file to create the necessary database tables.
4. **API Integration:**
   - Obtain an API key from the chosen chat API provider.
   - Update the API key in the configuration file.
5. **Run the Application:**
   - Start the XAMPP server.
   - Access the application in your web browser using the following URL: `http://localhost/[project-directory]`

## Usage

1. **Create an Account:**
   - Register a new account by providing a username and password.
2. **Login:**
   - Log in to your account using your credentials.
3. **Chat:**
   - Search for other users and start a conversation.
   - Send and receive messages in real-time.
   - View the online status of other users.
4. **Message History:**
   - Access the message history of your conversations.
   - Search for specific messages or users.

## Contributing

We welcome contributions to this project. Please follow these steps:

1. **Fork the Repository:**
   - Create a fork of the repository on your GitHub account.
2. **Create a Branch:**
   - Create a new branch for your feature or bug fix.
3. **Make Changes:**
   - Make your changes to the code.
4. **Commit Changes:**
   - Commit your changes with clear and concise commit messages.
5. **Push Changes:**
   - Push your changes to your forked repository.
6. **Create a Pull Request:**
   - Create a pull request from your branch to the main branch of the original repository.

## License

This project is licensed under the MIT License.

##Collaboration

This repo contains a main branch as the main branch for all development work.

Each task is to be done on a separate branch and PRs (Pull Requests) open to the main branch. So before you start working on a new task, you first checkout to main with

git checkout main

Then you pull latest change from main to your local environment with

git pull --rebase origin main

Create a new branch to carry out your task with

git branch <branch_name>

After this you checkout to the new branch where you are to carry out your task with 
git checkout -b <new_branch>

Note: `<branch_name>` should be short, e.g. if you are working on authentication, you can use the name `auth` or `user-auth` for branch name.

When done with your task, you commit your changes and then you are expected to pull latest changes from `main` with 

`git pull --rebase origin main`

 and resolve any merge conflicts if any.

After this, you then push to remote repository, create a PR and request for review.

## Contributors

Ashu Boris
Njie Ubryne
Bridgette 
Nkombou Junior

