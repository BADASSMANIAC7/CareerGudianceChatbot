import sys
import json

role = sys.argv[1].strip().lower()

roadmaps = {
    "data scientist": [
        "Learn Python, SQL, and Excel",
        "Study Statistics and Probability",
        "Master Data Cleaning and Visualization",
        "Learn Machine Learning algorithms",
        "Work on real-world projects and build a portfolio"
    ],
    "software developer": [
        "Learn a programming language (e.g., Python, Java, C++)",
        "Understand data structures and algorithms",
        "Build small projects to practice",
        "Learn version control (Git)",
        "Apply for internships or entry-level jobs"
    ],
    "aiml engineer": [
        "Understand the fundamentals required for aiml engineer",
        "Study tools and technologies used in aiml engineer roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "api specialist": [
        "Understand the fundamentals required for api specialist",
        "Study tools and technologies used in api specialist roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "application support engineer": [
        "Understand the fundamentals required for application support engineer",
        "Study tools and technologies used in application support engineer roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "business analyst": [
        "Understand the fundamentals required for business analyst",
        "Study tools and technologies used in business analyst roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "customer service executive": [
        "Understand the fundamentals required for customer service executive",
        "Study tools and technologies used in customer service executive roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "cyber security specialist": [
        "Understand the fundamentals required for cyber security specialist",
        "Study tools and technologies used in cyber security specialist roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "database administrator": [
        "Understand the fundamentals required for database administrator",
        "Study tools and technologies used in database administrator roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "graphics designer": [
        "Understand the fundamentals required for graphics designer",
        "Study tools and technologies used in graphics designer roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "hardware engineer": [
        "Understand the fundamentals required for hardware engineer",
        "Study tools and technologies used in hardware engineer roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "helpdesk engineer": [
        "Understand the fundamentals required for helpdesk engineer",
        "Study tools and technologies used in helpdesk engineer roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "networking engineer": [
        "Understand the fundamentals required for networking engineer",
        "Study tools and technologies used in networking engineer roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ],
    "project manager": [
        "Understand the fundamentals required for project manager",
        "Study tools and technologies used in project manager roles",
        "Work on relevant projects or labs",
        "Gain certifications or formal training if available",
        "Apply for roles and continue learning on the job"
    ]
}

output = {"role": role, "steps": roadmaps.get(role, ["No roadmap found for this role."])}
print(json.dumps(output))
