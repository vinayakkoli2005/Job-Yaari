<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'SSC CGL Admit Card 2026 Released - Download Tier 1 Hall Ticket',
                'short_description' => 'Staff Selection Commission has released the SSC CGL Admit Card for Tier 1 Examination. Steps to download and direct link here.',
                'content' => 'The Staff Selection Commission (SSC) has officially released the Hall Ticket / Admit Card for the Combined Graduate Level (CGL) Tier 1 Examination 2026. Registered candidates can download their admit cards from their respective regional SSC websites using their registration number and date of birth.<br><br><strong>How to Download SSC CGL Tier 1 Admit Card:</strong><br>1. Visit the official regional SSC website.<br>2. Click on the link "Status / Download Admit Card For Combined Graduate Level Examination, 2026".<br>3. Enter your Roll No. / Registration ID and Date of Birth.<br>4. Download the admit card and take a printout.<br><br>Please verify your name, exam center, date, time, and instructions carefully before appearing for the exam.',
                'category' => 'Admit Card',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(2)->toDateString(),
            ],
            [
                'title' => 'UPSC Civil Services Prelims Result 2026 PDF - Check Qualified Candidates List',
                'short_description' => 'Union Public Service Commission has declared the result of Civil Services Preliminary Examination 2026. Direct PDF link inside.',
                'content' => 'The Union Public Service Commission (UPSC) has announced the results for the Civil Services (Preliminary) Examination, 2026. Candidates who appeared for the prelims on the scheduled dates can check their roll numbers in the official qualified candidates list PDF.<br><br>The successful candidates have qualified for admission to the Civil Services (Main) Examination, 2026. They must apply again in the Detailed Application Form-I (DAF-I) which will be available shortly on the UPSC portal.<br><br>To search your roll number, download the PDF, open it with a PDF viewer, and press Ctrl+F to type in your roll number. Best of luck!',
                'category' => 'Result',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(5)->toDateString(),
            ],
            [
                'title' => 'IBPS PO Recruitment 2026 Notification Out - Apply Online for 4000+ Posts',
                'short_description' => 'Institute of Banking Personnel Selection has released the PO/MT notification. Check eligibility, dates, and apply link.',
                'content' => 'The Institute of Banking Personnel Selection (IBPS) has released the common recruitment process (CRP) notification for Probationary Officers (PO) / Management Trainees (MT) in participating banks. There are over 4000 vacancies available for college graduates.<br><br><strong>Important Dates:</strong><br>- Online Application Start: June 1, 2026<br>- Last Date to Apply: June 21, 2026<br>- Preliminary Exam Date: October 2026<br><br><strong>Eligibility Criteria:</strong><br>- Educational Qualification: A degree (Graduation) in any discipline from a recognized University.<br>- Age Limit: 20 to 30 years (with age relaxation applicable as per rules).',
                'category' => 'Job Notification',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(1)->toDateString(),
            ],
            [
                'title' => 'RRB NTPC Syllabus & Detailed Exam Pattern 2026 PDF Download',
                'short_description' => 'Get the complete, topic-wise syllabus and exam pattern for Railway Recruitment Board NTPC Exam (CBT 1 & CBT 2) 2026.',
                'content' => 'Are you preparing for the Railway Recruitment Board (RRB) Non-Technical Popular Categories (NTPC) Exam? Understanding the syllabus and test structure is the first step to clearing it. Here is the detailed topic-wise syllabus for both CBT 1 and CBT 2.<br><br><strong>Exam Pattern (CBT-1):</strong><br>- General Awareness: 40 Questions<br>- Mathematics: 30 Questions<br>- General Intelligence & Reasoning: 30 Questions<br>- Total Time: 90 Minutes<br><br>Download the topic-wise PDF detailing arithmetic, algebra, general science, current affairs, and logical reasoning subtopics to streamline your preparation.',
                'category' => 'Syllabus',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(10)->toDateString(),
            ],
            [
                'title' => 'SBI Clerk Admit Card 2026 Out - Direct Link to Download Prelims Call Letter',
                'short_description' => 'State Bank of India (SBI) has released the Prelims Admit Card for Junior Associates. Download before the last date.',
                'content' => 'State Bank of India has activated the download link for the SBI Clerk Preliminary Examination Call Letter 2026. Candidates who applied for SBI Junior Associates can access their call letters by logging into the official portal.<br><br>Remember to carry a hard copy of the admit card, a valid photo identity card (along with a photocopy), and recent passport size photographs. Without these documents, entry will not be permitted.',
                'category' => 'Admit Card',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(4)->toDateString(),
            ],
            [
                'title' => 'UGC NET June 2026 Result Announced - Check Cut Off Marks & Scorecard',
                'short_description' => 'National Testing Agency (NTA) has declared the UGC NET June Session results. Check subject-wise cutoff lists.',
                'content' => 'The National Testing Agency (NTA) has declared the results for UGC NET June 2026 Examination. The exam, conducted for the posts of Assistant Professor and Junior Research Fellowship (JRF), was taken by lakhs of candidates nationwide.<br><br>Candidates can download their scorecard containing sectional percentages and qualification status. NTA has also uploaded the subject-wise and category-wise cut-off mark lists on the official website.',
                'category' => 'Result',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(7)->toDateString(),
            ],
            [
                'title' => 'Indian Army Agniveer Recruitment Rally 2026 Notification - Registration Details',
                'short_description' => 'Indian Army invites online applications for Agniveer Rally. Physical fitness standards and age criteria guidelines.',
                'content' => 'The Indian Army has announced the Agniveer Recruitment Rally schedule and online registration details for the year 2026. The recruitment is open for Agniveer General Duty (GD), Agniveer Technical, Agniveer Clerk / Store Keeper Technical, and Agniveer Tradesmen.<br><br>Interested male and female candidates can register on the Join Indian Army portal. Shortlisted applicants will undergo physical, medical, and written tests.',
                'category' => 'Job Notification',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(3)->toDateString(),
            ],
            [
                'title' => 'LIC AAO Syllabus 2026 - Section-wise Topics & Prep Strategy',
                'short_description' => 'Life Insurance Corporation of India Assistant Administrative Officer detailed syllabus. Phase 1 & 2 guidelines.',
                'content' => 'Prepare for LIC AAO 2026 with our comprehensive syllabus analysis and preparation recommendations. The exam is highly competitive and covers reasoning, quantitative aptitude, general awareness, computer knowledge, and insurance/financial market awareness.<br><br>In addition to standard test prep books, make sure to read financial newspapers and study core banking/insurance concepts to ace the Phase 2 Mains exam.',
                'category' => 'Syllabus',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(12)->toDateString(),
            ],
            [
                'title' => 'RBI Grade B Officer 2026 Phase 2 Result Declared - Check Merit List',
                'short_description' => 'Reserve Bank of India has published the roll numbers of candidates shortlisted for Phase 3 Interview round.',
                'content' => 'The Reserve Bank of India Services Board has officially released the Phase 2 exam results for recruitment of Grade B Officers (General, DEPR, DSIM) - 2026.<br><br>Shortlisted candidates are required to submit their documents online and will receive instructions regarding the dates and venue of their Interview round shortly. Merit ranking and scores of all candidates will be available after the final selection process is concluded.',
                'category' => 'Result',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(15)->toDateString(),
            ],
            [
                'title' => 'Delhi Police Constable Recruitment 2026 Notification - 5000+ Vacancies',
                'short_description' => 'Staff Selection Commission announced Delhi Police Executive Constable jobs. Dates, requirements, and physical standards.',
                'content' => 'The Staff Selection Commission, in collaboration with the Delhi Police, has released the notification for the recruitment of Constable (Executive) Male and Female. Eligible candidates can register online starting this week.<br><br><strong>Selection Process:</strong><br>1. Computer-Based Examination (100 Marks)<br>2. Physical Endurance & Measurement Test (PE&MT) (Qualifying)<br><br>Candidates must have completed 10+2 from a recognized board to apply.',
                'category' => 'Job Notification',
                'image_path' => null,
                'published_at' => Carbon::now()->subDays(8)->toDateString(),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
