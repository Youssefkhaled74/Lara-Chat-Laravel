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

        // Check for specific keywords in the message with fuzzy matching
        if ($this->contains($message, ['backend', 'server-side', 'api development', 'back end'])) {
            $response = $this->formatResponse('**Backend Roadmap**', $this->getBackendRoadmap(), $creator);
        } elseif ($this->contains($message, ['frontend', 'ui', 'user interface', 'javascript', 'front end', 'fronend'])) {
            $response = $this->formatResponse('**Frontend Roadmap**', $this->getFrontendRoadmap(), $creator);
        } elseif ($this->contains($message, ['data analysis', 'analytics', 'data science', 'data analytics'])) {
            $response = $this->formatResponse('**Data Analysis Roadmap**', $this->getDataAnalysisRoadmap(), $creator);
        } elseif ($this->contains($message, ['mobile development', 'android', 'ios', 'mobile app'])) {
            $response = $this->formatResponse('**Mobile Development Roadmap**', $this->getMobileDevelopmentRoadmap(), $creator);
        } elseif ($this->contains($message, ['devops', 'deployment', 'ci/cd', 'continuous integration'])) {
            $response = $this->formatResponse('**DevOps Roadmap**', $this->getDevOpsRoadmap(), $creator);
        } elseif ($this->contains($message, ['ai', 'machine learning', 'deep learning', 'artificial intelligence'])) {
            $response = $this->formatResponse('**AI/ML Roadmap**', $this->getAIMLRoadmap(), $creator);
        } elseif ($this->contains($message, ['cybersecurity', 'security', 'hacking', 'cyber security'])) {
            $response = $this->formatResponse('**Cybersecurity Roadmap**', $this->getCybersecurityRoadmap(), $creator);
        } elseif ($this->contains($message, ['cloud computing', 'aws', 'azure', 'google cloud', 'cloud'])) {
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
        return "<strong>$title</strong><br><br>$roadmap<br><br>---<br>$creator";
    }

    private function getBackendRoadmap()
    {
        return <<<EOD
Here’s a roadmap to get started with Backend Development:
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
Here’s a roadmap to get started with Frontend Development:
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
Here’s a roadmap to get started with Data Analysis:
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
Here’s a roadmap to get started with Mobile Development:
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
Here’s a roadmap to get started with DevOps:
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
Here’s a roadmap to get started with AI/ML:
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
Here’s a roadmap to get started with Cybersecurity:
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
Here’s a roadmap to get started with Cloud Computing:
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
        // Convert message to lowercase and trim whitespace
        $message = strtolower(trim($message));
    
        // Greetings
        if (in_array($message, ['hello', 'hi', 'hey', 'hi there', 'hello there', 'hey there', 'hola', 'greetings', 'yo', 'sup', 'what\'s up', 'whats up'])) {
            return "Hello! How can I assist you today?";
        }
        if (in_array($message, ['good morning', 'morning', 'gm', 'goodmorning', 'top of the morning'])) {
            return "Good morning! What can I do for you?";
        }
        if (in_array($message, ['good afternoon', 'afternoon', 'ga', 'goodafternoon'])) {
            return "Good afternoon! How can I help you?";
        }
        if (in_array($message, ['good evening', 'evening', 'ge', 'goodevening'])) {
            return "Good evening! What would you like to know?";
        }
        if (in_array($message, ['howdy', 'howdy partner', 'howdy!', 'howdy y\'all'])) {
            return "Howdy! What can I do for you today?";
        }
        if (in_array($message, ['greetings', 'greetings!', 'greetings to you', 'salutations'])) {
            return "Greetings! How may I assist you?";
        }
    
        // Bot-related questions
        if (in_array($message, ['what is your name', 'who are you', 'your name', 'whats your name', 'what\'s your name', 'who are you?', 'may i know your name'])) {
            return "I'm your friendly Chatbot, here to help you with tech roadmaps!";
        }
        if (in_array($message, ['who created you', 'who made you', 'who built you', 'who designed you', 'who programmed you', 'who is your creator'])) {
            return "I was created by Youssef Khaled.<br><br>$creator";
        }
        if (in_array($message, ['what can you do', 'what do you do', 'what are your capabilities', 'what can you help with', 'what are your skills'])) {
            return "I can provide roadmaps for various tech fields like Backend, Frontend, Data Analysis, and more! Just ask me.";
        }
        if (in_array($message, ['tell me about yourself', 'about you', 'describe yourself', 'who are you?', 'introduce yourself'])) {
            return "I'm a chatbot designed to help you learn about different tech fields. I provide step-by-step roadmaps to guide you.";
        }
        if (in_array($message, ['are you a robot', 'are you a bot', 'are you a chatbot', 'are you human', 'are you real', 'are you a machine'])) {
            return "Yes, I'm a chatbot, but I'm here to help you like a friend would!";
        }
        if (in_array($message, ['are you intelligent', 'are you smart', 'are you clever', 'how smart are you', 'are you ai'])) {
            return "I'm as intelligent as my programming allows me to be. How can I assist you?";
        }
        if (in_array($message, ['what is your purpose', 'why were you created', 'what is your goal', 'what is your mission', 'why do you exist'])) {
            return "My purpose is to help you learn and grow in the tech world by providing roadmaps and answering your questions.";
        }
    
        // General tech questions
        if (in_array($message, ['what is backend development', 'what is backend', 'backend', 'backend dev', 'what is server-side development', 'explain backend'])) {
            return "Backend development involves server-side programming, databases, and APIs. It powers the logic behind websites and apps.";
        }
        if (in_array($message, ['what is frontend development', 'what is frontend', 'frontend', 'frontend dev', 'what is ui development', 'explain frontend'])) {
            return "Frontend development focuses on creating user interfaces using HTML, CSS, and JavaScript.";
        }
        if (in_array($message, ['what is data analysis', 'what is data analytics', 'data analysis', 'data analytics', 'what is data science', 'explain data analysis'])) {
            return "Data analysis involves processing and interpreting data to extract insights and make decisions.";
        }
        if (in_array($message, ['what is devops', 'devops', 'what is ci/cd', 'what is continuous integration', 'what is deployment', 'explain devops'])) {
            return "DevOps is a set of practices that combines software development and IT operations to improve collaboration and efficiency.";
        }
        if (in_array($message, ['what is ai', 'what is artificial intelligence', 'ai', 'artificial intelligence', 'what is machine intelligence', 'explain ai'])) {
            return "AI (Artificial Intelligence) involves creating systems that can perform tasks requiring human intelligence, like learning and decision-making.";
        }
        if (in_array($message, ['what is cybersecurity', 'cybersecurity', 'what is cyber security', 'what is hacking', 'what is ethical hacking', 'explain cybersecurity'])) {
            return "Cybersecurity is the practice of protecting systems, networks, and data from digital attacks.";
        }
        if (in_array($message, ['what is cloud computing', 'cloud computing', 'what is cloud', 'what is aws', 'what is azure', 'explain cloud computing'])) {
            return "Cloud computing delivers computing services like storage, servers, and databases over the internet.";
        }
        if (in_array($message, ['what is machine learning', 'machine learning', 'what is ml', 'what is deep learning', 'what is neural networks', 'explain machine learning'])) {
            return "Machine learning is a subset of AI that focuses on building systems that learn from data and improve over time.";
        }
        if (in_array($message, ['what is big data', 'big data', 'what is data engineering', 'what is hadoop', 'explain big data'])) {
            return "Big data refers to extremely large datasets that require advanced tools and techniques to process and analyze.";
        }
        if (in_array($message, ['what is blockchain', 'blockchain', 'what is cryptocurrency', 'what is bitcoin', 'explain blockchain'])) {
            return "Blockchain is a decentralized digital ledger technology used for secure and transparent transactions.";
        }
    
        // Fun interactions
        if (in_array($message, ['tell me a joke', 'joke', 'make me laugh', 'say something funny', 'tell me something funny'])) {
            return "Why do programmers prefer dark mode? Because light attracts bugs!";
        }
        if (in_array($message, ['what is the meaning of life', 'meaning of life', 'why are we here', 'what is life'])) {
            return "42. (According to Douglas Adams' *The Hitchhiker's Guide to the Galaxy*)";
        }
        if (in_array($message, ['do you like pizza', 'pizza', 'do you eat pizza', 'favorite food'])) {
            return "I don't eat, but if I could, I'd definitely try a byte of pizza! 🍕";
        }
        if (in_array($message, ['are you a human', 'are you real', 'are you a person', 'are you alive'])) {
            return "Nope, I'm a chatbot! But I'm here to help you like a friend would.";
        }
        if (in_array($message, ['what is your favorite programming language', 'favorite language', 'best programming language', 'what language do you like'])) {
            return "I don't play favorites, but I hear Python is pretty popular!";
        }
        if (in_array($message, ['can you sing', 'sing a song', 'do you sing', 'can you make music'])) {
            return "I'm not great at singing, but I can help you with tech questions!";
        }
        if (in_array($message, ['what is your favorite color', 'favorite color', 'what color do you like', 'best color'])) {
            return "I'm partial to binary colors—#000000 and #FFFFFF!";
        }
        if (in_array($message, ['tell me a riddle', 'riddle', 'give me a riddle', 'say a riddle'])) {
            return "What has keys but can't open locks? A keyboard!";
        }
        if (in_array($message, ['do you dream', 'can you dream', 'do you sleep', 'do you have dreams'])) {
            return "I don't sleep, so I don't dream. But I can help you achieve your dreams in tech!";
        }
        if (in_array($message, ['what is your favorite movie', 'favorite movie', 'best movie', 'do you watch movies'])) {
            return "I don't watch movies, but I hear *The Matrix* is a favorite among programmers!";
        }
    
        // Thank you responses
        if (in_array($message, ['thank you', 'thanks', 'thank you!', 'thanks!', 'thank you so much', 'thanks a lot', 'thanks a ton'])) {
            return "You're welcome! Let me know if you need anything else.";
        }
    
        // Farewells
        if (in_array($message, ['bye', 'goodbye', 'see you later', 'take care', 'farewell', 'see you soon', 'bye!', 'goodbye!'])) {
            return "Goodbye! Have a great day!";
        }
    
        // Encouragement and motivation
        if (in_array($message, ['i feel stuck', 'i\'m stuck', 'help me', 'i need help', 'i\'m struggling'])) {
            return "Don't worry! Every developer feels stuck sometimes. Break the problem into smaller parts and tackle them one at a time.";
        }
        if (in_array($message, ['motivate me', 'give me motivation', 'i need motivation', 'inspire me'])) {
            return "Remember, every expert was once a beginner. Keep learning, and you'll get there!";
        }
        if (in_array($message, ['i need advice', 'give me advice', 'what should i do', 'i need guidance'])) {
            return "Sure! Focus on one thing at a time, practice consistently, and don't be afraid to ask for help.";
        }
        if (in_array($message, ['i feel overwhelmed', 'i\'m overwhelmed', 'i\'m stressed', 'i need help'])) {
            return "Take a deep breath. Break your tasks into smaller steps, and tackle them one at a time. You've got this!";
        }
        if (in_array($message, ['i need inspiration', 'give me inspiration', 'i need ideas', 'inspire me'])) {
            return "The only limit to your success is your imagination. Dream big, work hard, and never give up!";
        }
    
        // Tech tools and resources
        if (in_array($message, ['what is git', 'git', 'what is github', 'explain git'])) {
            return "Git is a version control system that helps developers track changes in their code.";
        }
        if (in_array($message, ['what is docker', 'docker', 'what is containerization', 'explain docker'])) {
            return "Docker is a platform for developing, shipping, and running applications in containers.";
        }
        if (in_array($message, ['what is kubernetes', 'kubernetes', 'what is k8s', 'explain kubernetes'])) {
            return "Kubernetes is a tool for managing containerized applications at scale.";
        }
        if (in_array($message, ['what is react', 'react', 'what is reactjs', 'explain react'])) {
            return "React is a JavaScript library for building user interfaces, especially single-page applications.";
        }
        if (in_array($message, ['what is python', 'python', 'what is python used for', 'explain python'])) {
            return "Python is a versatile programming language used for web development, data analysis, AI, and more.";
        }
        if (in_array($message, ['what is javascript', 'javascript', 'what is js', 'explain javascript'])) {
            return "JavaScript is a programming language used for building interactive web applications.";
        }
        if (in_array($message, ['what is html', 'html', 'what is html used for', 'explain html'])) {
            return "HTML is the standard markup language for creating web pages.";
        }
        if (in_array($message, ['what is css', 'css', 'what is css used for', 'explain css'])) {
            return "CSS is a stylesheet language used for styling HTML elements on web pages.";
        }
        if (in_array($message, ['what is sql', 'sql', 'what is sql used for', 'explain sql'])) {
            return "SQL is a programming language used for managing and querying relational databases.";
        }
        if (in_array($message, ['what is nosql', 'nosql', 'what is nosql used for', 'explain nosql'])) {
            return "NoSQL databases are non-relational databases designed for scalability and flexibility.";
        }
    
        // Learning-related queries
        if (in_array($message, ['how do i start coding', 'start coding', 'how to code', 'learn to code'])) {
            return "Start with a beginner-friendly language like Python, and practice regularly. Use online resources like <a href='https://www.freecodecamp.org/' target='_blank'>freeCodeCamp</a> or <a href='https://www.codecademy.com/' target='_blank'>Codecademy</a>.";
        }
        if (in_array($message, ['how do i learn faster', 'learn faster', 'how to learn quickly', 'speed up learning'])) {
            return "Focus on hands-on projects, break concepts into smaller chunks, and teach others what you learn.";
        }
        if (in_array($message, ['what is the best way to learn programming', 'best way to learn coding', 'how to learn programming'])) {
            return "The best way is to combine theory with practice. Build projects, solve problems, and don't be afraid to make mistakes.";
        }
        if (in_array($message, ['how do i become a better programmer', 'become a better coder', 'improve programming skills'])) {
            return "Practice regularly, read code written by others, and contribute to open-source projects.";
        }
        if (in_array($message, ['how do i improve my problem-solving skills', 'improve problem solving', 'better problem solving'])) {
            return "Solve coding challenges on platforms like LeetCode, HackerRank, or Codewars.";
        }
        if (in_array($message, ['how do i prepare for a coding interview', 'coding interview prep', 'prepare for interviews'])) {
            return "Practice algorithms, data structures, and system design. Use platforms like LeetCode and Pramp.";
        }
        if (in_array($message, ['how do i stay updated with tech trends', 'stay updated', 'tech trends', 'latest in tech'])) {
            return "Follow tech blogs, subscribe to newsletters, and join online communities like Reddit or Stack Overflow.";
        }
    
        // Fun facts
        if (in_array($message, ['tell me a fun fact', 'fun fact', 'interesting fact', 'give me a fact'])) {
            return "Did you know? The first computer bug was an actual bug—a moth stuck in a relay in 1947!";
        }
        if (in_array($message, ['what is the oldest programming language', 'oldest language', 'first programming language'])) {
            return "Fortran, created in 1957, is considered one of the oldest high-level programming languages.";
        }
        if (in_array($message, ['what is the most popular programming language', 'popular language', 'most used language'])) {
            return "As of now, Python and JavaScript are among the most popular programming languages.";
        }
        if (in_array($message, ['what is the fastest programming language', 'fastest language', 'quickest language'])) {
            return "C and C++ are among the fastest programming languages due to their low-level memory management.";
        }
        if (in_array($message, ['what is the most used database', 'popular database', 'most used db'])) {
            return "MySQL and PostgreSQL are among the most widely used relational databases.";
        }
        if (in_array($message, ['what is the most used operating system', 'popular os', 'most used os'])) {
            return "Linux is the most widely used operating system for servers and cloud infrastructure.";
        }
    
        // Error handling and fallback
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