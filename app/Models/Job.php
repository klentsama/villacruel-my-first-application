<?php
namespace App\Models;
class Job
{
public static function all()
{
        return [
            [
                'id' => 1,
                'title' => 'Senior Developer',
                'salary' => '$120,000 - $150,000',
                'tags' => ['Full-time', 'Remote'],
                'emoji' => '💻',
                'description' => 'We are seeking a talented Senior Developer to join our dynamic team. This role involves building and maintaining scalable web applications.'
            ],
            [
                'id' => 2,
                'title' => 'UX/UI Designer',
                'salary' => '$80,000 - $95,000',
                'tags' => ['Part-time', 'Hybrid'],
                'emoji' => '🎨',
                'description' => 'A creative UX/UI Designer to work on user-centered design solutions. Experience with Figma and user research is a plus.'
            ],
            [
                'id' => 3,
                'title' => 'Data Analyst',
                'salary' => '$75,000 - $90,000',
                'tags' => ['Full-time', 'Remote'],
                'emoji' => '📊',
                'description' => 'We\'re looking for a detail-oriented Data Analyst to help us interpret data and make data-driven decisions.'
            ],
            [
                'id' => 4,
                'title' => 'Marketing Manager',
                'salary' => '$90,000 - $110,000',
                'tags' => ['Full-time', 'In-person'],
                'emoji' => '📢',
                'description' => 'A creative Marketing Manager to lead our campaigns and grow our brand. This role requires strategic thinking and a passion for digital marketing.'
            ],
            [
                'id' => 5,
                'title' => 'Financial Analyst',
                'salary' => '$85,000 - $100,000',
                'tags' => ['Full-time', 'On-site'],
                'emoji' => '📈',
                'description' => 'We are looking for a Financial Analyst to help us with budget planning, forecasting, and financial modeling.'
            ],
            [
                'id' => 6,
                'title' => 'Cybersecurity Engineer',
                'salary' => '$110,000 - $130,000',
                'tags' => ['Full-time', 'Remote'],
                'emoji' => '🛡️',
                'description' => 'Join our team to protect our digital assets and infrastructure from cyber threats. Experience with network security is a plus.'
            ],
            [
                'id' => 7,
                'title' => 'Content Strategist',
                'salary' => '$65,000 - $80,000',
                'tags' => ['Part-time', 'Hybrid'],
                'emoji' => '✍️',
                'description' => 'We are searching for a Content Strategist to develop and execute our content marketing strategy.'
            ],
            [
                'id' => 8,
                'title' => 'Mobile App Developer',
                'salary' => '$115,000 - $140,000',
                'tags' => ['Full-time', 'Remote'],
                'emoji' => '📱',
                'description' => 'A Mobile App Developer to build native and cross-platform mobile applications. Experience with Swift or Kotlin is a plus.'
            ]
        ];
}
public static function find($id)
{
    $job = \Illuminate\Support\Arr::first(static::all(), fn($job) => $job['id'] == $id);
    if (! $job) {
    abort(404);
    }
    return $job;
}
}