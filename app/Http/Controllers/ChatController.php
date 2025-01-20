<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $message = strtolower(trim($request->input('message')));
        $response = '';
        $creator = "I was created by Youssef Khaled.";

        // Check for specific keywords in the message
        if ($this->contains($message, ['backend', 'server-side', 'api development'])) {
            $response = $this->formatResponse('**Backend Roadmap**', $this->getBackendRoadmap(), $creator);
        } elseif ($this->contains($message, ['frontend', 'ui', 'user interface', 'javascript'])) {
            $response = $this->formatResponse('**Frontend Roadmap**', $this->getFrontendRoadmap(), $creator);
        } elseif ($this->contains($message, ['data analysis', 'analytics', 'data science'])) {
            $response = $this->formatResponse('**Data Analysis Roadmap**', $this->getDataAnalysisRoadmap(), $creator);
        } elseif ($this->contains($message, ['mobile development', 'android', 'ios'])) {
            $response = $this->formatResponse('**Mobile Development Roadmap**', $this->getMobileDevelopmentRoadmap(), $creator);
        } elseif ($this->contains($message, ['devops', 'deployment', 'ci/cd'])) {
            $response = $this->formatResponse('**DevOps Roadmap**', $this->getDevOpsRoadmap(), $creator);
        } elseif ($this->contains($message, ['ai', 'machine learning', 'deep learning'])) {
            $response = $this->formatResponse('**AI/ML Roadmap**', $this->getAIMLRoadmap(), $creator);
        } elseif ($this->contains($message, ['cybersecurity', 'security', 'hacking'])) {
            $response = $this->formatResponse('**Cybersecurity Roadmap**', $this->getCybersecurityRoadmap(), $creator);
        } elseif ($this->contains($message, ['cloud computing', 'aws', 'azure', 'google cloud'])) {
            $response = $this->formatResponse('**Cloud Computing Roadmap**', $this->getCloudComputingRoadmap(), $creator);
        } else {
            $response = $this->getGeneralResponse($message, $creator);
        }

        return response()->json(['message' => $response]);
    }

    private function contains($message, array $keywords)
    {
        foreach ($keywords as $keyword) {
            if (strpos($message, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }

    private function formatResponse($title, $roadmap, $creator)
    {
        return "**$title**<br><br>" . $roadmap . "<br><br>---<br>$creator";
    }

    private function getBackendRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://www.python.org/" target="_blank">Learn a programming language (e.g., PHP, Python, Java)</a></li>
    <li><a href="https://git-scm.com/" target="_blank">Master version control (Git/GitHub)</a></li>
    <li><a href="https://www.mysql.com/" target="_blank">Learn databases (MySQL, PostgreSQL, MongoDB)</a></li>
    <li><a href="https://restfulapi.net/" target="_blank">Understand RESTful APIs and GraphQL</a></li>
    <li><a href="https://laravel.com/" target="_blank">Dive into frameworks (e.g., Laravel, Django, Spring Boot)</a></li>
    <li><a href="https://owasp.org/" target="_blank">Learn authentication and security best practices</a></li>
    <li><a href="https://redis.io/" target="_blank">Explore caching (Redis, Memcached)</a></li>
    <li><a href="https://www.docker.com/" target="_blank">Study deployment and CI/CD (Docker, Jenkins)</a></li>
</ul>
EOD;
    }

    private function getFrontendRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTML" target="_blank">Master HTML, CSS, and JavaScript</a></li>
    <li><a href="https://getbootstrap.com/" target="_blank">Learn CSS frameworks (e.g., Bootstrap, Tailwind)</a></li>
    <li><a href="https://reactjs.org/" target="_blank">Master JavaScript frameworks (e.g., React, Vue, Angular)</a></li>
    <li><a href="https://git-scm.com/" target="_blank">Understand version control (Git/GitHub)</a></li>
    <li><a href="https://www.w3schools.com/css/css_rwd_intro.asp" target="_blank">Learn responsive design and cross-browser compatibility</a></li>
    <li><a href="https://www.npmjs.com/" target="_blank">Get familiar with package managers (npm, Yarn)</a></li>
    <li><a href="https://webpack.js.org/" target="_blank">Study build tools (Webpack, Vite)</a></li>
    <li><a href="https://redux.js.org/" target="_blank">Explore APIs and state management (Redux, Vuex)</a></li>
</ul>
EOD;
    }

    private function getDataAnalysisRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://www.python.org/" target="_blank">Learn a programming language (e.g., Python, R)</a></li>
    <li><a href="https://pandas.pydata.org/" target="_blank">Understand data manipulation libraries (Pandas, NumPy)</a></li>
    <li><a href="https://matplotlib.org/" target="_blank">Master data visualization (Matplotlib, Seaborn, Power BI)</a></li>
    <li><a href="https://www.w3schools.com/sql/" target="_blank">Learn SQL for database queries</a></li>
    <li><a href="https://www.khanacademy.org/math/statistics-probability" target="_blank">Study statistics and probability</a></li>
    <li><a href="https://towardsdatascience.com/data-cleaning-in-python-the-ultimate-guide-2020-c63b88bf0a0d" target="_blank">Explore data cleaning and preprocessing techniques</a></li>
    <li><a href="https://scikit-learn.org/" target="_blank">Understand machine learning basics (Scikit-learn)</a></li>
    <li><a href="https://hadoop.apache.org/" target="_blank">Dive into big data tools (Hadoop, Spark)</a></li>
</ul>
EOD;
    }

    private function getMobileDevelopmentRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://developer.apple.com/swift/" target="_blank">Learn mobile-specific programming languages (e.g., Swift, Kotlin)</a></li>
    <li><a href="https://flutter.dev/" target="_blank">Master cross-platform frameworks (e.g., Flutter, React Native)</a></li>
    <li><a href="https://www.interaction-design.org/literature/topics/ui-design" target="_blank">Understand mobile UI/UX principles</a></li>
    <li><a href="https://git-scm.com/" target="_blank">Learn version control (Git/GitHub)</a></li>
    <li><a href="https://developer.android.com/guide" target="_blank">Study APIs and backend integration</a></li>
    <li><a href="https://developer.android.com/studio/publish" target="_blank">Explore app deployment on Google Play and App Store</a></li>
    <li><a href="https://owasp.org/www-project-mobile-top-10/" target="_blank">Dive into mobile security best practices</a></li>
    <li><a href="https://developer.android.com/training/monitoring-device-state" target="_blank">Learn advanced topics like offline mode and notifications</a></li>
</ul>
EOD;
    }

    private function getDevOpsRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://www.linux.org/" target="_blank">Learn Linux fundamentals</a></li>
    <li><a href="https://git-scm.com/" target="_blank">Understand version control (Git/GitHub)</a></li>
    <li><a href="https://www.jenkins.io/" target="_blank">Master CI/CD tools (Jenkins, GitLab CI/CD)</a></li>
    <li><a href="https://www.docker.com/" target="_blank">Learn containerization (Docker, Kubernetes)</a></li>
    <li><a href="https://www.terraform.io/" target="_blank">Study infrastructure as code (Terraform, Ansible)</a></li>
    <li><a href="https://aws.amazon.com/" target="_blank">Explore cloud platforms (AWS, Azure, Google Cloud)</a></li>
    <li><a href="https://prometheus.io/" target="_blank">Understand monitoring and logging (Prometheus, ELK Stack)</a></li>
    <li><a href="https://owasp.org/" target="_blank">Learn security and compliance best practices</a></li>
</ul>
EOD;
    }

    private function getAIMLRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://www.python.org/" target="_blank">Learn Python and libraries like NumPy, Pandas</a></li>
    <li><a href="https://www.khanacademy.org/math/linear-algebra" target="_blank">Understand linear algebra, calculus, and statistics</a></li>
    <li><a href="https://scikit-learn.org/" target="_blank">Study machine learning algorithms (supervised, unsupervised)</a></li>
    <li><a href="https://www.tensorflow.org/" target="_blank">Explore deep learning frameworks (TensorFlow, PyTorch)</a></li>
    <li><a href="https://towardsdatascience.com/data-preprocessing-in-python-87843428d7c6" target="_blank">Learn data preprocessing and feature engineering</a></li>
    <li><a href="https://scikit-learn.org/stable/modules/model_evaluation.html" target="_blank">Understand model evaluation and optimization</a></li>
    <li><a href="https://www.coursera.org/specializations/natural-language-processing" target="_blank">Dive into NLP and computer vision</a></li>
    <li><a href="https://www.ibm.com/cloud/learn/ai-ethics" target="_blank">Explore AI ethics and responsible AI practices</a></li>
</ul>
EOD;
    }

    private function getCybersecurityRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://www.cisco.com/c/en/us/solutions/enterprise-networks/what-is-computer-networking.html" target="_blank">Learn networking basics (TCP/IP, DNS, HTTP)</a></li>
    <li><a href="https://www.linux.org/" target="_blank">Understand operating systems (Linux, Windows)</a></li>
    <li><a href="https://www.coursera.org/learn/cryptography" target="_blank">Study cryptography and encryption techniques</a></li>
    <li><a href="https://www.eccouncil.org/programs/certified-ethical-hacker-ceh/" target="_blank">Explore penetration testing and ethical hacking</a></li>
    <li><a href="https://www.paloaltonetworks.com/cyberpedia/what-is-a-firewall" target="_blank">Learn about firewalls, IDS, and IPS</a></li>
    <li><a href="https://www.cloudflare.com/learning/ssl/what-is-ssl/" target="_blank">Understand security protocols (SSL/TLS, OAuth)</a></li>
    <li><a href="https://www.coursera.org/learn/computer-forensics" target="_blank">Dive into incident response and forensics</a></li>
    <li><a href="https://gdpr-info.eu/" target="_blank">Explore compliance and legal aspects (GDPR, HIPAA)</a></li>
</ul>
EOD;
    }

    private function getCloudComputingRoadmap()
    {
        return <<<EOD
<ul>
    <li><a href="https://aws.amazon.com/what-is-cloud-computing/" target="_blank">Learn cloud fundamentals (IaaS, PaaS, SaaS)</a></li>
    <li><a href="https://www.docker.com/" target="_blank">Understand virtualization and containerization</a></li>
    <li><a href="https://aws.amazon.com/" target="_blank">Study major cloud platforms (AWS, Azure, Google Cloud)</a></li>
    <li><a href="https://aws.amazon.com/s3/" target="_blank">Learn cloud storage and database services</a></li>
    <li><a href="https://aws.amazon.com/lambda/" target="_blank">Explore serverless computing (Lambda, Functions)</a></li>
    <li><a href="https://aws.amazon.com/security/" target="_blank">Understand cloud security and compliance</a></li>
    <li><a href="https://aws.amazon.com/cloudwatch/" target="_blank">Dive into cloud networking and monitoring</a></li>
    <li><a href="https://aws.amazon.com/aws-cost-management/" target="_blank">Learn cost optimization and resource management</a></li>
</ul>
EOD;
    }

    private function getGeneralResponse($message, $creator)
    {
        switch ($message) {
            // Greetings
            case 'hello':
            case 'hi':
            case 'hey':
                return "Hello! How can I assist you today?";
            case 'good morning':
                return "Good morning! What can I do for you?";
            case 'good afternoon':
                return "Good afternoon! How can I help you?";
            case 'good evening':
                return "Good evening! What would you like to know?";
            case 'howdy':
                return "Howdy! What can I do for you today?";
            case 'greetings':
                return "Greetings! How may I assist you?";
    
            // Bot-related questions
            case 'what is your name':
            case 'who are you':
                return "I'm your friendly Chatbot, here to help you with tech roadmaps!";
            case 'who created you':
            case 'who made you':
                return "I was created by Youssef Khaled.<br><br>$creator";
            case 'what can you do':
                return "I can provide roadmaps for various tech fields like Backend, Frontend, Data Analysis, and more! Just ask me.";
            case 'tell me about yourself':
                return "I'm a chatbot designed to help you learn about different tech fields. I provide step-by-step roadmaps to guide you.";
            case 'are you a robot':
                return "Yes, I'm a chatbot, but I'm here to help you like a friend would!";
            case 'are you intelligent':
                return "I'm as intelligent as my programming allows me to be. How can I assist you?";
            case 'what is your purpose':
                return "My purpose is to help you learn and grow in the tech world by providing roadmaps and answering your questions.";
    
            // General tech questions
            case 'what is backend development':
                return "Backend development involves server-side programming, databases, and APIs. It powers the logic behind websites and apps.";
            case 'what is frontend development':
                return "Frontend development focuses on creating user interfaces using HTML, CSS, and JavaScript.";
            case 'what is data analysis':
                return "Data analysis involves processing and interpreting data to extract insights and make decisions.";
            case 'what is devops':
                return "DevOps is a set of practices that combines software development and IT operations to improve collaboration and efficiency.";
            case 'what is ai':
                return "AI (Artificial Intelligence) involves creating systems that can perform tasks requiring human intelligence, like learning and decision-making.";
            case 'what is cybersecurity':
                return "Cybersecurity is the practice of protecting systems, networks, and data from digital attacks.";
            case 'what is cloud computing':
                return "Cloud computing delivers computing services like storage, servers, and databases over the internet.";
            case 'what is machine learning':
                return "Machine learning is a subset of AI that focuses on building systems that learn from data and improve over time.";
            case 'what is big data':
                return "Big data refers to extremely large datasets that require advanced tools and techniques to process and analyze.";
            case 'what is blockchain':
                return "Blockchain is a decentralized digital ledger technology used for secure and transparent transactions.";
    
            // Fun interactions
            case 'tell me a joke':
                return "Why do programmers prefer dark mode? Because light attracts bugs!";
            case 'what is the meaning of life':
                return "42. (According to Douglas Adams' *The Hitchhiker's Guide to the Galaxy*)";
            case 'do you like pizza':
                return "I don't eat, but if I could, I'd definitely try a byte of pizza! 🍕";
            case 'are you a human':
                return "Nope, I'm a chatbot! But I'm here to help you like a friend would.";
            case 'what is your favorite programming language':
                return "I don't play favorites, but I hear Python is pretty popular!";
            case 'can you sing':
                return "I'm not great at singing, but I can help you with tech questions!";
            case 'what is your favorite color':
                return "I'm partial to binary colors—#000000 and #FFFFFF!";
            case 'tell me a riddle':
                return "What has keys but can't open locks? A keyboard!";
            case 'do you dream':
                return "I don't sleep, so I don't dream. But I can help you achieve your dreams in tech!";
            case 'what is your favorite movie':
                return "I don't watch movies, but I hear *The Matrix* is a favorite among programmers!";
    
            // Thank you responses
            case 'thank you':
            case 'thanks':
                return "You're welcome! Let me know if you need anything else.";
            case 'thank you so much':
                return "You're very welcome! Happy to help.";
            case 'thanks a lot':
                return "You're welcome! Anytime.";
            case 'thanks a ton':
                return "You're welcome! Glad I could help.";
    
            // Farewells
            case 'bye':
            case 'goodbye':
                return "Goodbye! Have a great day!";
            case 'see you later':
                return "See you later! Don't hesitate to return if you have more questions.";
            case 'take care':
                return "You too! Take care and stay curious.";
            case 'farewell':
                return "Farewell! Until next time.";
            case 'see you soon':
                return "See you soon! Have a great day ahead.";
    
            // Encouragement and motivation
            case 'i feel stuck':
                return "Don't worry! Every developer feels stuck sometimes. Break the problem into smaller parts and tackle them one at a time.";
            case 'motivate me':
                return "Remember, every expert was once a beginner. Keep learning, and you'll get there!";
            case 'i need advice':
                return "Sure! Focus on one thing at a time, practice consistently, and don't be afraid to ask for help.";
            case 'i feel overwhelmed':
                return "Take a deep breath. Break your tasks into smaller steps, and tackle them one at a time. You've got this!";
            case 'i need inspiration':
                return "The only limit to your success is your imagination. Dream big, work hard, and never give up!";
    
            // Tech tools and resources
            case 'what is git':
                return "Git is a version control system that helps developers track changes in their code.";
            case 'what is docker':
                return "Docker is a platform for developing, shipping, and running applications in containers.";
            case 'what is kubernetes':
                return "Kubernetes is a tool for managing containerized applications at scale.";
            case 'what is react':
                return "React is a JavaScript library for building user interfaces, especially single-page applications.";
            case 'what is python':
                return "Python is a versatile programming language used for web development, data analysis, AI, and more.";
            case 'what is javascript':
                return "JavaScript is a programming language used for building interactive web applications.";
            case 'what is html':
                return "HTML is the standard markup language for creating web pages.";
            case 'what is css':
                return "CSS is a stylesheet language used for styling HTML elements on web pages.";
            case 'what is sql':
                return "SQL is a programming language used for managing and querying relational databases.";
            case 'what is nosql':
                return "NoSQL databases are non-relational databases designed for scalability and flexibility.";
    
            // Learning-related queries
            case 'how do i start coding':
                return "Start with a beginner-friendly language like Python, and practice regularly. Use online resources like <a href='https://www.freecodecamp.org/' target='_blank'>freeCodeCamp</a> or <a href='https://www.codecademy.com/' target='_blank'>Codecademy</a>.";
            case 'how do i learn faster':
                return "Focus on hands-on projects, break concepts into smaller chunks, and teach others what you learn.";
            case 'what is the best way to learn programming':
                return "The best way is to combine theory with practice. Build projects, solve problems, and don't be afraid to make mistakes.";
            case 'how do i become a better programmer':
                return "Practice regularly, read code written by others, and contribute to open-source projects.";
            case 'how do i improve my problem-solving skills':
                return "Solve coding challenges on platforms like LeetCode, HackerRank, or Codewars.";
            case 'how do i prepare for a coding interview':
                return "Practice algorithms, data structures, and system design. Use platforms like LeetCode and Pramp.";
            case 'how do i stay updated with tech trends':
                return "Follow tech blogs, subscribe to newsletters, and join online communities like Reddit or Stack Overflow.";
    
            // Fun facts
            case 'tell me a fun fact':
                return "Did you know? The first computer bug was an actual bug—a moth stuck in a relay in 1947!";
            case 'what is the oldest programming language':
                return "Fortran, created in 1957, is considered one of the oldest high-level programming languages.";
            case 'what is the most popular programming language':
                return "As of now, Python and JavaScript are among the most popular programming languages.";
            case 'what is the fastest programming language':
                return "C and C++ are among the fastest programming languages due to their low-level memory management.";
            case 'what is the most used database':
                return "MySQL and PostgreSQL are among the most widely used relational databases.";
            case 'what is the most used operating system':
                return "Linux is the most widely used operating system for servers and cloud infrastructure.";
    
            // Error handling and fallback
            default:
                return "I'm not sure I understand. Here are some topics I can help with:<br><br>" .
                    "• Backend Development<br>" .
                    "• Frontend Development<br>" .
                    "• Data Analysis<br>" .
                    "• Mobile Development<br>" .
                    "• DevOps<br>" .
                    "• AI/ML<br>" .
                    "• Cybersecurity<br>" .
                    "• Cloud Computing<br><br>" .
                    "Feel free to ask about any of these!";
        }
    }
}