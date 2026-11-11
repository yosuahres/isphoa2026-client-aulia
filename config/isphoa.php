<?php

/*
|--------------------------------------------------------------------------
| ISPhOA 2026 site content
|--------------------------------------------------------------------------
|
| Ported from the Next.js app at apps/web/src/content/site.ts. Template
| literals and cross-references from that file are already resolved here,
| so these are plain literal values.
|
*/

return [
    'about' => [
        'heading' => 'About ISPhOA 2026',
        'paragraphs' => [
            [
                'The ',
                [
                    'em' => 'International Seminar on Photonics, Optics, and its Applications (ISPhOA)',
                ],
                ' is a biennial scientific program that first began in 2014. The first ISPhOA was held on ',
                [
                    'em' => 'October 14–15, 2014, in Sanur, Bali',
                ],
                ', and continued with successive seminars on ',
                [
                    'em' => 'August 24–25, 2016, in Kuta, Bali',
                ],
                ', and on ',
                [
                    'em' => 'August 1–2, 2018, in Surabaya',
                ],
                '. Due to the worldwide spread of the COVID-19 pandemic, the 4th ISPhOA was held in full online mode on ',
                [
                    'em' => 'December 1–2, 2020',
                ],
                ', and then also the subsequent 5th ISPhOA on ',
                [
                    'em' => 'November 29–30, 2022',
                ],
                '. After a hiatus in 2024, the 6th ISPhOA is now scheduled to be held on ',
                [
                    'em' => 'December 2–3, 2026, in Batusangkar, West Sumatra',
                ],
                '.',
            ],
            [
                'Since its establishment, ISPhOA has been dedicated and aimed as a scientific forum to bring together leading national and international researchers, engineers, and practitioners that are interested in developing innovations in any of the ',
                [
                    'em' => 'light-based-related technologies',
                ],
                '. The seminar offers plenary, keynote, and invited talks given by prominent researchers in the related topics on photonics and optics, as well as contributed oral and poster presentations, special sessions, and exhibitions of commercial products. Participants will also engage in social and cultural events to foster informal networking talks in a friendly setting.',
            ],
            [
                'This year ISPhOA 2026 will feature the theme of ',
                [
                    'em' => 'AI-driven light-based technology innovations',
                ],
                ', and it is envisioned as a platform for generating innovative ideas by leveraging advancements in ',
                [
                    'em' => 'artificial intelligence (AI)',
                ],
                ' technology. We expect these AI advancements to spur new innovations in light-based technology that will address various societal challenges.',
            ],
        ],
        'eyebrow' => 'About the Seminar',
        'titleLead' => 'The Future of Light',
        'titleTail' => 'Starts Here',
        'bodyOne' => [
            'before' => 'ISPhOA 2026 continues a proud tradition of uniting the global photonics and optics community. This edition convenes in ',
            'emphasis' => 'Batusangkar, West Sumatra',
            'after' => ', the historic heartland of Minangkabau civilization, offering a uniquely Indonesian backdrop for world-class scientific exchange.',
        ],
        'bodyTwo' => 'The seminar bridges fundamental research and translational innovation, connecting academia with industry to accelerate adoption of photonic technologies across energy, healthcare, communications, and sustainable development.',
        'facts' => [
            [
                'icon' => 'pin',
                'text' => 'UIN Mahmud Yunus Batusangkar, West Sumatra, Indonesia',
            ],
            [
                'icon' => 'calendar',
                'text' => '2–3 December 2026',
            ],
            [
                'icon' => 'globe',
                'text' => 'Hybrid: On-site & Online (Zoom)',
            ],
            [
                'icon' => 'users',
                'text' => '600+ Participants from 25+ Countries',
            ],
        ],
        'quote' => 'We invite researchers and engineers worldwide to join us for a seminar dedicated to the science of light, in the heart of Minangkabau.',
        'quoteAttribution' => 'ORGANIZING COMMITTEE CHAIR · ISPhOA 2026',
    ],
    /*
     | The news strip under the bar. Set to null to take it off the site --
     | every page reads this one key, so a passed announcement needs no markup
     | change. 'text' is set in caps by the stylesheet, so it is written here
     | the way it would be read aloud.
     |
     | 'href' pointing at an image opens it full size over the page, the way
     | the Call for Papers poster does; anything else is followed as a plain
     | link. 'imageWidth' and 'imageHeight' are the file's own pixels, so the
     | overlay reserves the right box before it loads.
     */
    'announcement' => [
        'text' => 'Final Call for Papers | Full Paper Submission by October 31st, 2026',
        'href' => '/photos/call-for-papers-poster.jpg',
        'imageWidth' => 1365,
        'imageHeight' => 2048,
    ],
    'authorDocuments' => [
        'guidelines' => '/documents/ISPhOA-2026-Paper-Submission-Guidelines.docx',
        'ethics' => '/documents/SPIE-Guidelines-for-Ethical-Publishing.pdf',
        'wordTemplate' => '/documents/ProcSPIETemplate_Letter.docx',
        'samplePdf' => '/documents/ProcSPIETemplate_Letter.pdf',
        'latexStyle' => '/documents/spie-proceedings-style.zip',
    ],
    'brand' => [
        'logo' => '/brand/logo-circle.png',
        'logoWidth' => 288,
        'logoHeight' => 288,
        'logoMain' => '/brand/logo-main.png',
        'logoMainWidth' => 560,
        'logoMainHeight' => 236,
    ],
    'colophon' => 'ISPhOA 2026 · Batusangkar · 2–3 Dec 2026',
    'committee' => [
        'patronage' => [
            'heading' => 'Patronage',
            'entries' => [
                'Rector UIN Mahmud Yunus Batusangkar, Tanah Datar, West Sumatera',
                'Rector University of Andalas, Padang, West Sumatera',
                'Rector Institut Teknologi Sepuluh Nopember, Surabaya, Indonesia',
                'Rector University of Airlangga, Surabaya, Indonesia',
                'Rector National University, Jakarta, Indonesia',
            ],
        ],
        'boards' => [
            [
                'heading' => 'Advisory Board',
                'chair' => 'Prof. Agus Muhamad Hatta, S.T., M.Si., Ph.D. (Indonesia)',
                'members' => [
                    'Prof. Delmus Puneri Salim, M.Res., Ph.D. (Indonesia)',
                    'Prof. Dr. Mai Efdi, M.Si. (Indonesia)',
                    'Prof. Erning Wihardjo (Indonesia)',
                    'Dr. Sarun Sumriddetchkajorn (Thailand)',
                    'Prof. Senthil Murugan Ganapathy (UK)',
                    'Prof. Sulaiman Wadi Harun (Malaysia)',
                    'Prof. Sar Sardy (Indonesia)',
                    'Prof. Harith Ahmad (Malaysia)',
                    'Prof. Parvez Haris (UK)',
                    'Prof. Suganda Jutamulia (USA)',
                    'Prof. Azzedine Boudrioua (France)',
                    'Prof. Joewono Widjaja (Thailand)',
                    'Prof. Percival F. Almoro (Philippines)',
                ],
            ],
            [
                'heading' => 'Technical Program Committee',
                'chair' => 'Dr.rer.nat. Aulia M. T. Nasution (ITS, Indonesia)',
                'members' => [
                    'Prof. Dr. Yulkifli, M.Si. (UNP, Indonesia)',
                    'Prof. Dr. Retna Apsari, M.Si. (UNAIR, Indonesia)',
                    'Prof. Dr. Alexander A.P. Iskandar (Bandung Institute of Technology - ITB)',
                    'Prof. Dr. Henri Putra Uranus (University of Pelita Harapan - UPH)',
                    'Prof. Dr. Hery Suyanto (University of Udayana - UNUD)',
                    'Prof. Dr. Isnaeni (National Research and Innovation Agency)',
                    'Prof. Dr. Retno Wigajatri (University of Indonesia - UI)',
                    'Prof. Dr. Suprijanto (Bandung Institute of Technology - ITB)',
                    'Prof. Dr. Husin Alatas (IPB University)',
                    'Prof. Dr. Hendradi Hardhienata (IPB University)',
                    'Prof. Suryani Dyah Astuti (University of Airlangga - UNAIR)',
                    'Prof. Dr. Purnomo Sidi Priambodo (University of Indonesia - UI)',
                    'Prof. Dr. P. L. Gareso (Universitas Hasanuddin - UNHAS)',
                    'Prof. Dr. Manish Tiwari (Manipal University, Jaipur, India)',
                    'Prof. Dr. Pengfei Wang (Shanghai Jiao Tong University, China)',
                    'Prof. Dr. Yusuf Nur Wijayanto (National Research and Innovation Agency)',
                    'Assoc. Prof. Dr. Mohd Zamani Zulkifli (International Islamic University Malaysia)',
                    'Assoc. Prof. Ahmad Fairuz Omar (University of Science Malaysia)',
                    'Dr. RongPing Wang (Australian National University)',
                    'Dr. Eng. Suryadi Soekardjo (BINUS University)',
                    'Dr. Ginu Rajan (Cardiff Metropolitan University)',
                    'Dr. Sunish Mathews (University College London)',
                    'Dr. Qian Wang (Data Storage Institute, Singapore)',
                    'Dr. Ing. Rajesh Kanawade (NCL CSIR, Pune - India)',
                    'Dr. Koo Hendrik Kurniawan (Maju Makmur Mandiri Research Center)',
                    'Dr. M Danang Birowosuto (University of Prasetya Mulya)',
                    'Dr. Maria M. Suliyanti (National Research and Innovation Agency)',
                    'Dr. Affi Nur Hidayah (National Research and Innovation Agency)',
                    'Dr. Tatas H.P. Brotosudarmo (University of Ciputra)',
                    'Dr. G.O.F. Parikesit (University of Gadjah Mada - UGM)',
                    'Dr. Eric Jobiliong (University of Pelita Harapan - UPH)',
                ],
            ],
        ],
        'organizing' => [
            'heading' => 'Organizing Committee',
            'roles' => [
                [
                    'role' => 'General Chair',
                    'name' => 'Dr. Frans Rizal Agustiyanto',
                ],
                [
                    'role' => 'Co-Chair',
                    'name' => 'Dr.rer.nat. Muldalisnur',
                ],
                [
                    'role' => 'Secretary',
                    'name' => 'Dr. Fitri Rahmah',
                ],
                [
                    'role' => 'Treasurer',
                    'name' => 'Dr. Detak Yan Pratama',
                ],
            ],
        ],
        'workingGroups' => [
            [
                'heading' => 'Secretariat',
                'chair' => 'Dr. Fitri Rahmah, M.T. (UNAS)',
                'members' => [
                    'Sri Maiyena, M.Sc., Ph.D (UIN MY Batusangkar)',
                    'Fitria Hidayanti, M.Si (UNAS)',
                ],
            ],
            [
                'heading' => 'Sponsorship',
                'chair' => 'Dr. Fadli Ama, M.T. (UNAIR)',
                'members' => [
                    'Dr. Harmadi (UNAND)',
                    'Dr. Ucuk Darusalam, S.T., M.T. (UNAS)',
                ],
            ],
            [
                'heading' => 'Documentation',
                'chair' => null,
                'members' => [
                    'Aidhya Irhash Putra, M.P., M.Agr. (UIN MY Batusangkar)',
                ],
            ],
            [
                'heading' => 'Program',
                'chair' => 'Dr. Maya Sari, M.Si. (UIN MY Batusangkar)',
                'members' => [
                    'Dr. Ramacos Fardela, M.Sc. (UNAND)',
                    'Fidyah Praguna Hayati, S.Si.',
                    'Fariska Nurjanah, S.Pd.',
                    'Nopitasari, S.Pd.',
                    'Bunga',
                ],
            ],
            [
                'heading' => 'Proceeding',
                'chair' => 'Ardyas Nur Aufa, S.T., M.T. (ITS)',
                'members' => [
                    'Hadiyati Idrus, M.Sc. (UIN MY Batusangkar)',
                    'Dr. Astuti, M.Si. (UNAND)',
                    'Rima Zuriah Amdani, M.Sc. (ITS)',
                    'Anto (ITS)',
                ],
            ],
            [
                'heading' => 'Publicity',
                'chair' => 'Iwan Conny Setiadi, M.T. (ITS)',
                'members' => [
                    'Aldo Novaznursyah Costrada, M.Si. (UNAND)',
                    'Raditya Widyadhana (ITS)',
                    'Naufaldi Azka (ITS)',
                    'Muhammad Baihaqi Ikhsan Kurniawan (ITS)',
                ],
            ],
            [
                'heading' => 'Technical',
                'chair' => 'Venny Haris, M.Si., Ph.D (UIN MY Batusangkar)',
                'members' => [
                    'Bushra Hamid, S.Pd. (UIN MY Batusangkar)',
                    'Hauliya Rahmah Z., S.Si. (UIN MY Batusangkar)',
                    'Habibie (UIN MY Batusangkar)',
                    'Rosyid (UIN MY Batusangkar)',
                ],
            ],
            [
                'heading' => 'Transportation',
                'chair' => 'Aidhya Irhash Putra, M.P., M.Agr. (UIN MY Batusangkar)',
                'members' => [
                    'Bushra Hamid, S.Pd. (UIN MY Batusangkar)',
                    'Hauliya Rahmah Z., S.Si. (UIN MY Batusangkar)',
                ],
            ],
        ],
    ],
    'copyright' => '© 2026 ISPhOA. All rights reserved.',
    'earlyBirdUntil' => '2026-11-01T23:59:59+07:00',
    'event' => [
        'shortName' => 'ISPhOA',
        'edition' => '2026',
        'fullName' => 'International Seminar on Photonics, Optics, and its Applications',
        'theme' => 'AI-driven Light-based Technology Innovations',
        'dates' => '2–3 December 2026',
        'datesShort' => '2–3 Dec 2026',
        'venue' => 'UIN Mahmud Yunus Batusangkar',
        'city' => 'Batusangkar',
        'region' => 'West Sumatra',
        'country' => 'Indonesia',
        'locality' => 'BATUSANGKAR · WEST SUMATRA',
        'format' => 'Hybrid: On-site & Online (Zoom)',
        'email' => 'secretariat@isphoa2026.org',
        'website' => 'https://isphoa2026.org',
        'startsAt' => '2026-12-02T08:00:00+07:00',
        'endsAt' => '2026-12-03T17:00:00+07:00',
    ],
    // Registration fees. Presenter rates are the early-bird rates; the
    // participant / listener rates are flat.
    'fees' => [
        [
            'id' => 'presenter',
            'heading' => 'Presenter',
            'earlyBird' => true,
            'groups' => [
                [
                    'label' => 'Domestic Presenter',
                    'rows' => [
                        ['category' => 'Academic / Professionals', 'online' => 'IDR 3,000,000', 'offline' => 'IDR 4,000,000'],
                        ['category' => 'Student', 'online' => 'IDR 2,500,000', 'offline' => 'IDR 3,500,000'],
                        ['category' => 'Additional Abstract', 'online' => 'IDR 2,500,000', 'offline' => 'IDR 2,500,000'],
                    ],
                ],
                [
                    'label' => 'International Presenter',
                    'rows' => [
                        ['category' => 'Academic / Professionals', 'online' => 'USD 200', 'offline' => 'USD 250'],
                        ['category' => 'Student', 'online' => 'USD 180', 'offline' => 'USD 220'],
                        ['category' => 'Additional Abstract', 'online' => 'USD 180', 'offline' => 'USD 180'],
                    ],
                ],
            ],
        ],
        [
            'id' => 'participant',
            'heading' => 'Participant / Listener',
            'earlyBird' => false,
            'groups' => [
                [
                    'label' => null,
                    'rows' => [
                        ['category' => 'Domestic Participant', 'online' => 'IDR 200,000', 'offline' => 'IDR 500,000'],
                        ['category' => 'International Participant', 'online' => 'USD 20', 'offline' => 'USD 50'],
                    ],
                ],
            ],
        ],
    ],
    'footerBlurb' => 'International Seminar on Photonics, Optics, and its Applications, bringing the science of light to the heart of Minangkabau.',
    'footerColumns' => [
        [
            'heading' => 'General Information',
            'links' => [
                [
                    'label' => 'How to Register',
                    'href' => '/registration#procedure',
                ],
                [
                    'label' => 'Registration Fee',
                    'href' => '/registration#fees',
                ],
                [
                    'label' => 'Call for Papers',
                    'href' => '/call-for-papers',
                ],
            ],
        ],
    ],
    'footerContact' => [
        [
            'icon' => 'mail',
            'text' => 'secretariat@isphoa2026.org',
        ],
        [
            'icon' => 'pin',
            'text' => 'UIN Mahmud Yunus Batusangkar, Batusangkar',
        ],
        [
            'icon' => 'calendar',
            'text' => '2–3 December 2026',
        ],
    ],
    'gallery' => [
        'heading' => 'Previous ISPhOA',
        'sub' => 'ISPhOA 2022 · UNIVERSITAS ANDALAS · PADANG',
        'items' => [
            [
                'title' => 'Opening Keynote Session',
                'sub' => 'Plenary hall, ISPhOA 2022',
            ],
            [
                'title' => 'Conference Audience',
                'sub' => 'Full attendance, main auditorium',
            ],
            [
                'title' => 'Workshop Session',
                'sub' => 'Hands-on lab, parallel track',
            ],
            [
                'title' => 'Seminar Proceedings',
                'sub' => 'Peer review & publication session',
            ],
            [
                'title' => 'Poster Exhibition',
                'sub' => 'Research poster session',
            ],
            [
                'title' => 'Networking & Collaboration',
                'sub' => 'Cross-institutional discussion',
            ],
        ],
    ],
    'hostCity' => [
        'eyebrow' => 'Host City',
        'titleLead' => 'Batusangkar,',
        'titleTail' => 'West Sumatra',
        'body' => 'The historic seat of the Minangkabau Kingdom. A city where centuries-old traditions, distinctive architecture, and vibrant culture await every visitor.',
        'feature' => [
            'photo' => '/photos/pagaruyung.jpg',
            'caption' => 'Istana Basa Pagaruyung, Royal Palace of Minangkabau',
            'locality' => 'BATUSANGKAR, TANAH DATAR · SUMATERA BARAT',
        ],
        'cards' => [
            [
                'title' => 'Pacu Jawi: Traditional Horse Parade',
                'sub' => 'A beloved Minangkabau tradition in Tanah Datar Regency',
            ],
            [
                'title' => 'Royal Minangkabau Bridal Attire',
                'sub' => 'The suntiang headdress and gold ceremonial dress',
            ],
        ],
        'philosophy' => [
            'label' => 'Minangkabau Philosophy',
            'quote' => 'Alam Takambang Jadi Guru',
            'translation' => 'Nature is the greatest teacher.',
            'body' => 'The guiding philosophy of the Minangkabau people, and a fitting spirit for a seminar dedicated to the science of light.',
        ],
    ],
    'invitedSpeakers' => [
        [
            'slug' => 'retna-apsari',
            'name' => 'Prof. Dr. Retna Apsari, M.Si.',
            'role' => 'Invited',
            'institution' => 'Universitas of Airlangga, Indonesia',
            'topic' => null,
            'photo' => '/photos/speakers/retna.jpeg',
            'bio' => [
                'Prof. Retna Apsari graduated in Physics (1991) from Brawijaya University, earned her Master in Physics from Gajah Mada University in 1998, and her Ph.D. in Physics (Laser Biooptics) from the University of Airlangga in 2009. She has authored 127 international papers with a current Scopus h-index of 18, and holds several patents related to diabetes detection systems.',
                'Prof. Retna Apsari is currently appointed as the Dean of the Faculty of Advanced Technology and Multidisciplinary.',
            ],
        ],
        [
            'slug' => 'hery-suyanto',
            'name' => 'Prof. Dr. Hery Suyanto',
            'role' => 'Invited',
            'institution' => 'University of Udayana, Indonesia',
            'topic' => null,
            'photo' => '/photos/speakers/invited/Picture8.jpg',
            'bio' => [
                'Hery Suyanto graduated in Physics from the Institut Teknologi Sepuluh Nopember Surabaya (ITS) in 1988, and earned his Master and Ph.D. (2003) in Optoelectronics from the Faculty of Optoelectronics and Laser Application, the University of Indonesia, Jakarta, Indonesia. In 2019, he was appointed Professor of Optoelectronics and Laser Application at Udayana University.',
                'He has carried out many collaborative research works, mostly at the Maju Makmur Mandiri Research Centre (MMM) in Jakarta, related to numerous applications of LIBS. His research interest focuses on LIBS applications on biomaterial samples such as nail, hair and teeth for biomarkers and pedigree analysis in his laboratory. These works have been published in more than 40 articles in international journals, and some of them are also being proposed as patents.',
            ],
        ],
        [
            'slug' => 'isnaeni',
            'name' => 'Prof. Dr. Isnaeni, M.Sc.',
            'role' => 'Invited',
            'institution' => 'Research Center for Photonics, BRIN, Indonesia',
            'topic' => null,
            'photo' => '/photos/speakers/invited/Picture9.jpg',
            'bio' => [
                'Prof. Isnaeni is a Research Professor in Optics (since 2024) at the National Research and Innovation Agency (BRIN), Indonesia. He graduated in Physics from IPB University, earned his Master\'s degree in Physics from the University of Queensland in 2006, and his Ph.D. in Physics from the Korea Advanced Institute of Science and Technology, South Korea (2012).',
                'His research interests are in quantum dots, graphene dots and plasmonic nanoparticles, laser spectroscopy, nonlinear optics, metamaterials, and nano-bio-photonics.',
                'He has authored more than 150 international publications during 2010–2026, and currently he is the Head of the Research Center for Photonics of the National Research and Innovation Agency (BRIN).',
            ],
        ],
        [
            'slug' => 'andri-mahendra',
            'name' => 'Andri Mahendra, Ph.D.',
            'role' => 'Invited',
            'institution' => 'Co-Founder and CEO, Nicslab',
            'topic' => null,
            'photo' => '/photos/speakers/invited/Picture11.jpg',
            'bio' => [
                'Andri Mahendra is the Co-Founder and CEO of Nicslab, a deep-tech company developing advanced test and measurement solutions for photonic integrated circuits, semiconductors, and emerging computing technologies. He holds a Ph.D. from the University of Sydney, with a research background in electronics, photonics instrumentation, and control systems. Under his leadership, Nicslab has developed high-density multichannel source-measure and photonic testing technologies used by leading research institutions, semiconductor companies, and government laboratories worldwide.',
                'Andri is actively involved in advancing the semiconductor and photonics ecosystem through technology development, intellectual property, industry collaboration, and international partnerships. He has also contributed to discussions and initiatives focused on strengthening Indonesia\'s semiconductor and deep-tech ecosystem.',
            ],
        ],
        [
            'slug' => 'ruri-agung-wahyuono',
            'name' => 'Dr. rer. nat. Ruri Agung Wahyuono',
            'role' => 'Invited',
            'institution' => 'Institut Teknologi Sepuluh Nopember, Indonesia',
            'topic' => null,
            'photo' => '/photos/speakers/invited/Picture12.jpg',
            'bio' => [
                'His academic and research expertise centers on advanced functional materials, particularly for energy, environmental, and sensing applications. He leads the ENABLE research group working with the Advanced Functional Materials Laboratory (AFML), which recently became a research-based spin-off company from ITS. ENABLE focuses on innovation in sensor and biosensor technology, smart and functional materials, and sustainable energy systems.',
                'He is an Assistant Professor in the Department of Engineering Physics at Institut Teknologi Sepuluh Nopember (ITS), with an h-index of 17 and 84 Scopus-indexed publications. He currently serves as the Chair of the Graduate Program in Innovation of System and Technology at the School of Interdisciplinary Management and Technology, ITS.',
                'Beyond his academic and industrial roles, he is passionate about community development, particularly in integrating renewable energy systems into smart farming and supporting sustainable production processes for small and medium enterprises. Through these efforts, he actively contributes to bridging research, technology innovation, and real-world societal impact, and was recently awarded an encouragement award by the Hitachi Global Foundation Asia.',
            ],
        ],
        [
            'slug' => 'yulkifli',
            'name' => 'Prof. Dr. Yulkifli, S.Pd., M.Si.',
            'role' => 'Invited',
            'institution' => 'Padang State University, Indonesia',
            'topic' => null,
            'photo' => '/photos/speakers/invited/Picture10.jpg',
            'bio' => [
                'Prof. Yulkifli graduated in Physics Education from IKIP Padang, and earned his Master (2002) and Ph.D. (2010) in Physics from the Bandung Institute of Technology. His fields of expertise are in sensors and sensor systems, physics of instrumentation, and physics education.',
                'He has published numerous international research papers in his fields of expertise, with 83 Scopus-indexed papers and an h-index of 9 (Scopus) and 16 (Google Scholar). His Scopus ID is 36005049600 and his ORCID ID is 0000-0002-0909-6227.',
            ],
        ],
    ],
    'keyDateGroups' => [
        [
            'heading' => 'Submission',
            'dates' => [
                // Per the Final Call for Papers poster. Setting 'extended' => true
                // on an entry marks it as such in the table.
                [
                    'n' => '01',
                    'label' => 'Full-paper Submission for Review',
                    'iso' => '2026-10-31T23:59:59+07:00',
                    'display' => '31 Oct 2026',
                ],
                [
                    'n' => '02',
                    'label' => 'Notification of Acceptance',
                    'iso' => '2026-11-15T00:00:00+07:00',
                    'display' => '15 Nov 2026',
                ],
                [
                    'n' => '04',
                    'label' => 'Camera-ready Full Paper Submission',
                    'iso' => '2026-11-20T23:59:59+07:00',
                    'display' => '20 Nov 2026',
                ],
            ],
        ],
        [
            'heading' => 'Registration',
            'dates' => [
                [
                    'n' => '03',
                    'label' => 'Early-bird Registration',
                    'iso' => '2026-11-20T23:59:59+07:00',
                    'display' => '10–20 Nov 2026',
                ],
                [
                    'n' => '03',
                    'label' => 'Normal Registration',
                    'iso' => '2026-11-21T00:00:00+07:00',
                    'display' => '21 Nov 2026',
                ],
                [
                    'n' => '05',
                    'label' => 'Seminar Program',
                    'iso' => '2026-12-02T08:00:00+07:00',
                    'display' => '2–3 Dec 2026',
                ],
            ],
        ],
    ],
    'keyDates' => [
        [
            'n' => '01',
            'label' => 'Full-paper Submission for Review',
            'iso' => '2026-09-15T23:59:59+07:00',
            'display' => '15 Sep 2026',
        ],
        [
            'n' => '02',
            'label' => 'Notification of Acceptance',
            'iso' => '2026-10-15T00:00:00+07:00',
            'display' => '15 Oct 2026',
        ],
        [
            'n' => '03',
            'label' => 'Early-bird Registration',
            'iso' => '2026-11-01T23:59:59+07:00',
            'display' => '01 Nov 2026',
        ],
        [
            'n' => '04',
            'label' => 'Camera-ready Full Paper Submission',
            'iso' => '2026-11-20T23:59:59+07:00',
            'display' => '20 Nov 2026',
        ],
        [
            'n' => '05',
            'label' => 'Seminar Program',
            'iso' => '2026-12-02T08:00:00+07:00',
            'display' => '2–3 Dec 2026',
        ],
    ],
    'nav' => [
        [
            'label' => 'Home',
            'href' => '/',
        ],
        [
            'label' => 'Conference',
            'children' => [
                [
                    'label' => 'Important Dates',
                    'href' => '/important-dates',
                ],
                [
                    'label' => 'Speakers',
                    'href' => '/speakers',
                ],
                [
                    'label' => 'Call for Papers',
                    'href' => '/call-for-papers',
                ],
            ],
        ],
        [
            'label' => 'Venue',
            'children' => [
                [
                    'label' => 'Conference Venue',
                    'href' => '/venue',
                ],
                [
                    'label' => 'Travel Information',
                    'href' => '/travel-information',
                ],
            ],
        ],
        [
            'label' => 'Committee',
            'href' => '/committee',
        ],
        [
            'label' => 'Submission',
            'href' => '/submission',
        ],
        [
            'label' => 'Registration',
            'href' => '/registration',
        ],
        [
            'label' => 'Contact',
            'href' => '/contact',
        ],
    ],
    'organizers' => [
        [
            'name' => 'UIN Mahmud Yunus Batusangkar',
            'logo' => '/brand/uin-batusangkar.png',
        ],
        [
            'name' => 'Universitas Andalas',
            'logo' => '/brand/universitas-andalas.png',
        ],
        [
            'name' => 'Universitas Nasional',
            'logo' => '/brand/universitas-nasional.png',
        ],
        [
            'name' => 'Universitas Airlangga',
            'logo' => '/brand/universitas-airlangga.png',
        ],
        [
            'name' => 'Institut Teknologi Sepuluh Nopember',
            'logo' => '/brand/its.png',
        ],
    ],
    // Where the registration fee is paid. Shown under the fee tables.
    'paymentMethod' => [
        'heading' => 'Wire Transfer',
        'rows' => [
            ['label' => 'Account Number', 'value' => '2104174953'],
            ['label' => 'Account Name', 'value' => 'Fitri Rahmah'],
            ['label' => 'Bank Name', 'value' => 'BNI'],
            ['label' => 'Bank Country', 'value' => 'Indonesia'],
        ],
    ],
    'paymentNote' => 'Payments are processed by Midtrans. Bank transfer, virtual account, QRIS, e-wallet and credit card are all supported. Your registration is confirmed automatically once the payment clears, and a receipt is emailed to you.',
    'peerReview' => [
        'heading' => 'Workflow of the Reviewing Process',
        'steps' => [
            [
                'text' => 'Authors submit their full paper (4 pages up to a maximum of 6 pages, including references) through the EasyChair ISPhOA 2026 submission page. Before submission, authors should self-scan their manuscript for AI-generated content and plagiarism, and make sure it falls below a threshold of 20% on both.',
            ],
            [
                'text' => 'The ISPhOA 2026 Publication Chair will re-scan the manuscript against both requirements to confirm they are met.',
            ],
            [
                'text' => 'Authors whose submission does not meet both threshold requirements will be contacted to resubmit a revised manuscript.',
            ],
            [
                'text' => 'Manuscripts that pass the scans above are assigned directly to 2 different reviewers with expertise in the paper\'s topic. Review follows a double-blind process.',
            ],
            [
                'text' => 'Submitted papers are reviewed against the paper\'s quality standards, based on the following aspects:',
                'items' => [
                    ['mark' => 'a', 'text' => 'Originality'],
                    ['mark' => 'b', 'text' => 'Novelty'],
                    ['mark' => 'c', 'text' => 'Soundness (covering methodological validity, reproducibility, technical soundness, and scientific rigour)'],
                    ['mark' => 'd', 'text' => 'Writing quality (correct English grammar, and the use of recent references)'],
                ],
            ],
            [
                'text' => 'Each aspect carries a set weight, and the review results are scored. Acceptance is decided by the total score given by the double-blind reviewers, against the quality threshold. Four outcomes are set:',
                'items' => [
                    ['mark' => 'A', 'text' => 'Accepted without revisions'],
                    ['mark' => 'B', 'text' => 'Accepted with MINOR revisions'],
                    ['mark' => 'C', 'text' => 'Accepted with MAJOR revisions'],
                    ['mark' => 'D', 'text' => 'Rejected'],
                ],
            ],
            [
                'text' => 'Authors will be notified of their outcome, with the following recommendations:',
                'items' => [
                    ['mark' => 'A', 'text' => 'Register for early bird, at the discounted registration fee. Authors are urged to format their accepted manuscript to strictly follow the template for publication in the SPIE Proceedings.'],
                    ['mark' => 'B', 'text' => 'Register for early bird, at the discounted registration fee, while making minor revisions based on the reviewers\' comments. Authors are also urged to format their accepted manuscript to strictly follow the template for publication in the SPIE Proceedings.'],
                    ['mark' => 'C', 'text' => 'Authors are required to make MAJOR revisions based on the reviewers\' comments, within the time frame given by the organizer, and resubmit their revised manuscript through their EasyChair account. A second round of blind review will be assigned to make sure the revised paper meets the quality standard. If the second round is positive, authors will be urged to register; otherwise they will be notified of the rejection.'],
                ],
            ],
        ],
    ],
    'plenarySpeakers' => [
        [
            'slug' => 'brian-yuliarto',
            'name' => 'Prof. Brian Yuliarto, S.T., M.Eng., Ph.D.',
            'role' => 'Plenary',
            'institution' => 'Minister of Higher Education, Science and Technology · Bandung Institute of Technology, Indonesia',
            'topic' => null,
            'photo' => '/photos/speakers/plenary/Picture1.jpg',
            'bio' => [
                'He is a Professor in advanced functional materials, specialized in nanomaterials and biosensors, from the Bandung Institute of Technology. He graduated in 1999 from the Department of Engineering Physics ITB, and earned his M.Sc. (2002) and Ph.D. (2005) in Quantum Engineering and System Science from the University of Tokyo, Japan. His research focuses on the development of nanotechnology-based sensors for detecting hazardous gases, environmental pollutants, and diagnosing diseases like cancer, hepatitis, and dengue fever. He has authored over 326 publications in international journals indexed by Scopus, with an h-index of 43. He received the Habibie Prize in 2024, a recognition as the top researcher in Nanoscience & Nanotechnology in Indonesia in 2023, and was listed among the world\'s top 2% of scientists in 2024. He was named the best researcher at ITB in 2021 and received the outstanding lecturer award in Science and Technology at ITB in 2017.',
                'Since 2025, he has been appointed as Minister of Higher Education, Science, and Technology. Previously he served as the Vice Rector of Research and Innovation, as the Dean of the Faculty of Industrial Technology, and as the Head of the Engineering Physics Department of the Bandung Institute of Technology.',
            ],
        ],
    ],
    'programme' => [],
    'publishing' => [
        'heading' => 'Paper Publishing Process',
        'steps' => [
            'Only ACCEPTED and PRESENTED papers will be eligible for publication in the SPIE Proceedings.',
            'The organizer of ISPhOA 2026 has signed a mutual contract with SPIE to publish ACCEPTED and PRESENTED papers that pass the quality standards in the SPIE Proceedings.',
            'Authors who have presented their papers at the ISPhOA 2026 seminar will be notified to submit their camera-ready manuscripts through the SPIE Submission System. Access to the SPIE Submission System will be given after the seminar ends.',
        ],
    ],
    'registrationNote' => 'All registrations include full seminar access, proceedings, and certificate of participation.',
    // The form the registration procedure sends people to. The steps
    // themselves are written out in the view, since one of them wraps a link.
    'registrationProcedure' => [
        'formUrl' => 'https://docs.google.com/forms/d/e/1FAIpQLSe7Dx261BSufBunHtU63OPAF4_Y5ONujpcVbCf1O4ZlW37iwQ/viewform',
    ],
    // Terms shown under the payment details on the registration page.
    'registrationTerms' => [
        'All payments made are final and cannot be refunded.',
        'Payments must be completed via bank transfer.',
        'Seminar kits are provided only for participants who present their papers onsite (offline).',
    ],
    'secretariat' => [
        'heading' => 'Local Organizer',
        'lines' => [
            'Sekretariat: Laboratorium Elektronika dan Instrumentasi (Gedung L)',
            'Tadris Fisika, Fakultas Tarbiyah dan Ilmu Keguruan',
            'UIN Mahmud Yunus Batusangkar',
            'Jalan Sudirman No. 137, Limo Kaum 27217',
        ],
        'phoneLabel' => '(0752) 71150',
        'phoneHref' => 'tel:+6275271150',
        'email' => 'isphoa2026@uinmybatusangkar.ac.id',
    ],
    'speakerGroups' => [
        [
            'heading' => 'Plenary Speaker',
            'people' => [
                [
                    'slug' => 'brian-yuliarto',
                    'name' => 'Prof. Brian Yuliarto, S.T., M.Eng., Ph.D.',
                    'role' => 'Plenary',
                    'institution' => 'Minister of Higher Education, Science and Technology · Bandung Institute of Technology, Indonesia',
                    'topic' => null,
                    'photo' => '/photos/speakers/plenary/Picture1.jpg',
                    'bio' => [
                        'He is a Professor in advanced functional materials, specialized in nanomaterials and biosensors, from the Bandung Institute of Technology. He graduated in 1999 from the Department of Engineering Physics ITB, and earned his M.Sc. (2002) and Ph.D. (2005) in Quantum Engineering and System Science from the University of Tokyo, Japan. His research focuses on the development of nanotechnology-based sensors for detecting hazardous gases, environmental pollutants, and diagnosing diseases like cancer, hepatitis, and dengue fever. He has authored over 326 publications in international journals indexed by Scopus, with an h-index of 43. He received the Habibie Prize in 2024, a recognition as the top researcher in Nanoscience & Nanotechnology in Indonesia in 2023, and was listed among the world\'s top 2% of scientists in 2024. He was named the best researcher at ITB in 2021 and received the outstanding lecturer award in Science and Technology at ITB in 2017.',
                        'Since 2025, he has been appointed as Minister of Higher Education, Science, and Technology. Previously he served as the Vice Rector of Research and Innovation, as the Dean of the Faculty of Industrial Technology, and as the Head of the Engineering Physics Department of the Bandung Institute of Technology.',
                    ],
                ],
            ],
        ],
        [
            'heading' => 'Keynote Speakers',
            'people' => [
                [
                    'slug' => 'hatta',
                    'name' => 'Prof. Agus Muhamad Hatta, S.T., M.Si., Ph.D.',
                    'role' => 'Keynote',
                    'institution' => 'Institut Teknologi Sepuluh Nopember · President of the Indonesia Optical Society (InOS)',
                    'topic' => null,
                    'photo' => '/photos/speakers/hatta.jpeg',
                    'bio' => [
                        'Prof. Agus Muhamad Hatta is Professor of Engineering Physics at the Institut Teknologi Sepuluh Nopember (ITS), Surabaya, where he currently serves as Vice Rector for Research, Innovation, Collaboration, and Alumni Relations.',
                        'He finished his undergraduate (S.T., equivalent to B.Eng) and his Master\'s at ITS, and earned his Ph.D. (2010) from the Photonics Research Centre, Technological University Dublin, Ireland.',
                        'As a member of the Photonic Engineering Laboratory, his research focuses on fiber-optic sensing, integrated optics, optical and photonic sensors, and quantum optics, with numerous contributions to optical fiber sensing technologies and photonic devices. He has published extensively in leading international journals and is widely recognized as one of Indonesia\'s prominent photonics researchers.',
                        'He currently also serves as the President of the Indonesia Optical Society (InOS).',
                    ],
                ],
                [
                    'slug' => 'ganapathy',
                    'name' => 'Prof. Senthil Murugan Ganapathy',
                    'role' => 'Keynote',
                    'institution' => 'University Southampton, UK',
                    'topic' => null,
                    'photo' => '/photos/speakers/keynotes/Picture3.jpg',
                    'bio' => [
                        'Prof. Senthil Murugan Ganapathy received his Ph.D. (Photonic Materials) in 2001 from the Indian Institute of Science, Bangalore. He worked as a post-doctoral fellow from 2001 to 2005 at the University of Bordeaux, France, and the Toyota Technological Institute, Japan. He joined the Optoelectronics Research Centre at the University of Southampton in April 2005, where he is currently a Professor and Head of the Integrated Photonic Devices Group, and Deputy Head of School (ORC) for Education. He is also an Adjunct Professor at the Indian Institute of Technology Madras, Chennai, India.',
                        'His expertise and research interests range from photonic materials to photonic systems, with a current focus on Mid-IR/high-contrast materials and devices for biomedical sensing, on-chip spectroscopy, on-chip nanoscopy, environmental monitoring and optical communication applications. He has made pioneering contributions in the field of novel optical micro-resonators.',
                    ],
                ],
                [
                    'slug' => 'azhar-zam',
                    'name' => 'Assoc. Prof. Azhar Zam, Ph.D.',
                    'role' => 'Keynote',
                    'institution' => 'NYU Abu Dhabi, UAE',
                    'topic' => null,
                    'photo' => '/photos/speakers/keynotes/Picture4.jpg',
                    'bio' => [
                        'Prof. Azhar Zam is an Associate Professor of Bioengineering. He holds a B.S. from the University of Indonesia, an M.Sc. from the University of Luebeck, Germany, and a Ph.D. from Friedrich-Alexander-University Erlangen-Nuremberg, Germany.',
                        'Zam\'s research interests focus on the development of smart devices for medical imaging, diagnostics, and monitoring using novel optical technologies, which include smart laser surgery, optical coherence tomography (OCT), photoacoustics, biomedical spectroscopy, AI-aided optical diagnostics and imaging, optical-based smart biosensors, and miniaturized systems. He has written over 85 peer-reviewed articles and book chapters, and books, and holds several patents.',
                        'Before joining NYUAD, Zam was an Assistant Professor in Medical Laser and Optics at the Department of Biomedical Engineering, University of Basel, Switzerland, where he founded the Biomedical Laser and Optics Group (BLOG) and co-established the MIRACLE II flagship project. Prior to that, he held research positions at the University of Waterloo, Waterloo, ON, Canada, the National University of Ireland Galway, Galway, Ireland, the Toronto Metropolitan University (formerly known as Ryerson University), Toronto, ON, Canada, and the University of California at Davis, Davis, CA, USA.',
                    ],
                ],
                [
                    'slug' => 'kanawade',
                    'name' => 'Dr.-Ing. Rajesh Kanawade',
                    'role' => 'Keynote',
                    'institution' => 'CSIR-National Chemical Laboratory, Pune, India',
                    'topic' => null,
                    'photo' => '/photos/speakers/keynotes/Picture5.jpg',
                    'bio' => [
                        'Dr.-Ing. Rajesh Kanawade is the head of the Hydrogen Engineering & Photonics Sensor Group, under the Physical and Materials Chemistry Division, CSIR–National Chemical Laboratory (CSIR-NCL), Pune, India. He obtained his M.Sc. in Physics (2006) from Savitribai Phule Pune University and his Doctor of Engineering (Dr.-Ing.) in 2013 from Friedrich-Alexander University Erlangen–Nürnberg, Germany.',
                        'His interdisciplinary research integrates optics, photonics, spectroscopy, biomedical imaging, laser instrumentation, Raman spectroscopy, laser-induced breakdown spectroscopy (LIBS), fiber-optic sensing, and optical diagnostics for healthcare and industrial applications. His work has produced important advances in biomedical spectroscopy and laser-based sensing technologies and has been published in leading journals in photonics and biophotonics.',
                    ],
                ],
                [
                    'slug' => 'chaompluk',
                    'name' => 'Assoc. Prof. Dr. Piyasak Chaumpluk',
                    'role' => 'Keynote',
                    'institution' => 'UniversityChulalongkorn, Thailand',
                    'topic' => null,
                    'photo' => '/photos/speakers/keynotes/Picture6.jpg',
                    'bio' => [
                        'Associate Prof. Dr. Piyasak Chaumpluk is currently a faculty member at the Genetics Program, Department of Botany, Faculty of Science, Chulalongkorn University, where he also serves as the Head of the Laboratory of Plant Transgenic Technology and Biosensor. His research integrates plant science and genetics with cutting-edge biosensor technology to address challenges in agriculture and biosciences.',
                        'He finished his B.Sc. at Khon Kaen University, and earned his Master of Agriculture (Plant Pathology) in 1990 and his Doctor of Agriculture (1996), both from Kyoto University. Prior to his current position, he gained valuable international experience as a Researcher at the Iwate Biotechnology Research Center in Japan, where he worked for three years.',
                        'His diverse research interests encompass lab-on-a-chip technology, DNA aptamers for novel detection methods, bio/nano sensors for nucleic acid detection in agriculture and biosciences, in vitro cultivation of plants, and enhancing the value of local genetic resources through genetic and biochemical analysis.',
                        'For his outstanding contributions to science and innovation, he has received several prestigious international honors, including the United Kingdom Leadership Award (Knight Level) in 2019 and the Brussels Eureka Innova Award (Chevalier Level) in 2016.',
                    ],
                ],
                [
                    'slug' => 'anto-satriyo-nugroho',
                    'name' => 'Prof. Dr. Eng. Anto Satriyo Nugroho',
                    'role' => 'Keynote',
                    'institution' => 'AI&C RC BRIN, Indonesia',
                    'topic' => null,
                    'photo' => '/photos/speakers/keynotes/Picture13.jpg',
                    'bio' => [
                        'Prof. Dr. Eng. Anto Satriyo Nugroho is a Research Professor in Artificial Intelligence and currently is the Head of Research Center for Artificial Intelligence and Cyber Security of the National Research and Innovation Agency (BRIN).',
                        'He got his B.Eng (1995), M.Eng. (2000), and Dr.Eng. (2003) in Electrical and Computer Engineering, all were from the Nagoya Institute of Technology. His research interests are devoted to biometrics, pattern recognition, and image processing.',
                        'He has authored 84 Scopus-indexed papers, with a current h-index of 12. His Scopus ID is 6701506291 and his ORCID ID is 0000-0002-5457-8786.',
                    ],
                ],
            ],
        ],
        [
            'heading' => 'Invited Speakers',
            'people' => [
                [
                    'slug' => 'retna-apsari',
                    'name' => 'Prof. Dr. Retna Apsari, M.Si.',
                    'role' => 'Invited',
                    'institution' => 'Universitas of Airlangga, Indonesia',
                    'topic' => null,
                    'photo' => '/photos/speakers/retna.jpeg',
                    'bio' => [
                        'Prof. Retna Apsari graduated in Physics (1991) from Brawijaya University, earned her Master in Physics from Gajah Mada University in 1998, and her Ph.D. in Physics (Laser Biooptics) from the University of Airlangga in 2009. She has authored 127 international papers with a current Scopus h-index of 18, and holds several patents related to diabetes detection systems.',
                        'Prof. Retna Apsari is currently appointed as the Dean of the Faculty of Advanced Technology and Multidisciplinary.',
                    ],
                ],
                [
                    'slug' => 'hery-suyanto',
                    'name' => 'Prof. Dr. Hery Suyanto',
                    'role' => 'Invited',
                    'institution' => 'University of Udayana, Indonesia',
                    'topic' => null,
                    'photo' => '/photos/speakers/invited/Picture8.jpg',
                    'bio' => [
                        'Hery Suyanto graduated in Physics from the Institut Teknologi Sepuluh Nopember Surabaya (ITS) in 1988, and earned his Master and Ph.D. (2003) in Optoelectronics from the Faculty of Optoelectronics and Laser Application, the University of Indonesia, Jakarta, Indonesia. In 2019, he was appointed Professor of Optoelectronics and Laser Application at Udayana University.',
                        'He has carried out many collaborative research works, mostly at the Maju Makmur Mandiri Research Centre (MMM) in Jakarta, related to numerous applications of LIBS. His research interest focuses on LIBS applications on biomaterial samples such as nail, hair and teeth for biomarkers and pedigree analysis in his laboratory. These works have been published in more than 40 articles in international journals, and some of them are also being proposed as patents.',
                    ],
                ],
                [
                    'slug' => 'isnaeni',
                    'name' => 'Prof. Dr. Isnaeni, M.Sc.',
                    'role' => 'Invited',
                    'institution' => 'Research Center for Photonics, BRIN, Indonesia',
                    'topic' => null,
                    'photo' => '/photos/speakers/invited/Picture9.jpg',
                    'bio' => [
                        'Prof. Isnaeni is a Research Professor in Optics (since 2024) at the National Research and Innovation Agency (BRIN), Indonesia. He graduated in Physics from IPB University, earned his Master\'s degree in Physics from the University of Queensland in 2006, and his Ph.D. in Physics from the Korea Advanced Institute of Science and Technology, South Korea (2012).',
                        'His research interests are in quantum dots, graphene dots and plasmonic nanoparticles, laser spectroscopy, nonlinear optics, metamaterials, and nano-bio-photonics.',
                        'He has authored more than 150 international publications during 2010–2026, and currently he is the Head of the Research Center for Photonics of the National Research and Innovation Agency (BRIN).',
                    ],
                ],
                [
                    'slug' => 'andri-mahendra',
                    'name' => 'Andri Mahendra, Ph.D.',
                    'role' => 'Invited',
                    'institution' => 'Co-Founder and CEO, Nicslab',
                    'topic' => null,
                    'photo' => '/photos/speakers/invited/Picture11.jpg',
                    'bio' => [
                        'Andri Mahendra is the Co-Founder and CEO of Nicslab, a deep-tech company developing advanced test and measurement solutions for photonic integrated circuits, semiconductors, and emerging computing technologies. He holds a Ph.D. from the University of Sydney, with a research background in electronics, photonics instrumentation, and control systems. Under his leadership, Nicslab has developed high-density multichannel source-measure and photonic testing technologies used by leading research institutions, semiconductor companies, and government laboratories worldwide.',
                        'Andri is actively involved in advancing the semiconductor and photonics ecosystem through technology development, intellectual property, industry collaboration, and international partnerships. He has also contributed to discussions and initiatives focused on strengthening Indonesia\'s semiconductor and deep-tech ecosystem.',
                    ],
                ],
                [
                    'slug' => 'ruri-agung-wahyuono',
                    'name' => 'Dr. rer. nat. Ruri Agung Wahyuono',
                    'role' => 'Invited',
                    'institution' => 'Institut Teknologi Sepuluh Nopember, Indonesia',
                    'topic' => null,
                    'photo' => '/photos/speakers/invited/Picture12.jpg',
                    'bio' => [
                        'His academic and research expertise centers on advanced functional materials, particularly for energy, environmental, and sensing applications. He leads the ENABLE research group working with the Advanced Functional Materials Laboratory (AFML), which recently became a research-based spin-off company from ITS. ENABLE focuses on innovation in sensor and biosensor technology, smart and functional materials, and sustainable energy systems.',
                        'He is an Assistant Professor in the Department of Engineering Physics at Institut Teknologi Sepuluh Nopember (ITS), with an h-index of 17 and 84 Scopus-indexed publications. He currently serves as the Chair of the Graduate Program in Innovation of System and Technology at the School of Interdisciplinary Management and Technology, ITS.',
                        'Beyond his academic and industrial roles, he is passionate about community development, particularly in integrating renewable energy systems into smart farming and supporting sustainable production processes for small and medium enterprises. Through these efforts, he actively contributes to bridging research, technology innovation, and real-world societal impact, and was recently awarded an encouragement award by the Hitachi Global Foundation Asia.',
                    ],
                ],
                [
                    'slug' => 'yulkifli',
                    'name' => 'Prof. Dr. Yulkifli, S.Pd., M.Si.',
                    'role' => 'Invited',
                    'institution' => 'Padang State University, Indonesia',
                    'topic' => null,
                    'photo' => '/photos/speakers/invited/Picture10.jpg',
                    'bio' => [
                        'Prof. Yulkifli graduated in Physics Education from IKIP Padang, and earned his Master (2002) and Ph.D. (2010) in Physics from the Bandung Institute of Technology. His fields of expertise are in sensors and sensor systems, physics of instrumentation, and physics education.',
                        'He has published numerous international research papers in his fields of expertise, with 83 Scopus-indexed papers and an h-index of 9 (Scopus) and 16 (Google Scholar). His Scopus ID is 36005049600 and his ORCID ID is 0000-0002-0909-6227.',
                    ],
                ],
            ],
        ],
    ],
    'speakers' => [
        [
            'slug' => 'hatta',
            'name' => 'Prof. Agus Muhamad Hatta, S.T., M.Si., Ph.D.',
            'role' => 'Keynote',
            'institution' => 'Institut Teknologi Sepuluh Nopember · President of the Indonesia Optical Society (InOS)',
            'topic' => null,
            'photo' => '/photos/speakers/hatta.jpeg',
            'bio' => [
                'Prof. Agus Muhamad Hatta is Professor of Engineering Physics at the Institut Teknologi Sepuluh Nopember (ITS), Surabaya, where he currently serves as Vice Rector for Research, Innovation, Collaboration, and Alumni Relations.',
                'He finished his undergraduate (S.T., equivalent to B.Eng) and his Master\'s at ITS, and earned his Ph.D. (2010) from the Photonics Research Centre, Technological University Dublin, Ireland.',
                'As a member of the Photonic Engineering Laboratory, his research focuses on fiber-optic sensing, integrated optics, optical and photonic sensors, and quantum optics, with numerous contributions to optical fiber sensing technologies and photonic devices. He has published extensively in leading international journals and is widely recognized as one of Indonesia\'s prominent photonics researchers.',
                'He currently also serves as the President of the Indonesia Optical Society (InOS).',
            ],
        ],
        [
            'slug' => 'ganapathy',
            'name' => 'Prof. Senthil Murugan Ganapathy',
            'role' => 'Keynote',
            'institution' => 'University Southampton, UK',
            'topic' => null,
            'photo' => '/photos/speakers/keynotes/Picture3.jpg',
            'bio' => [
                'Prof. Senthil Murugan Ganapathy received his Ph.D. (Photonic Materials) in 2001 from the Indian Institute of Science, Bangalore. He worked as a post-doctoral fellow from 2001 to 2005 at the University of Bordeaux, France, and the Toyota Technological Institute, Japan. He joined the Optoelectronics Research Centre at the University of Southampton in April 2005, where he is currently a Professor and Head of the Integrated Photonic Devices Group, and Deputy Head of School (ORC) for Education. He is also an Adjunct Professor at the Indian Institute of Technology Madras, Chennai, India.',
                'His expertise and research interests range from photonic materials to photonic systems, with a current focus on Mid-IR/high-contrast materials and devices for biomedical sensing, on-chip spectroscopy, on-chip nanoscopy, environmental monitoring and optical communication applications. He has made pioneering contributions in the field of novel optical micro-resonators.',
            ],
        ],
        [
            'slug' => 'azhar-zam',
            'name' => 'Assoc. Prof. Azhar Zam, Ph.D.',
            'role' => 'Keynote',
            'institution' => 'NYU Abu Dhabi, UAE',
            'topic' => null,
            'photo' => '/photos/speakers/keynotes/Picture4.jpg',
            'bio' => [
                'Prof. Azhar Zam is an Associate Professor of Bioengineering. He holds a B.S. from the University of Indonesia, an M.Sc. from the University of Luebeck, Germany, and a Ph.D. from Friedrich-Alexander-University Erlangen-Nuremberg, Germany.',
                'Zam\'s research interests focus on the development of smart devices for medical imaging, diagnostics, and monitoring using novel optical technologies, which include smart laser surgery, optical coherence tomography (OCT), photoacoustics, biomedical spectroscopy, AI-aided optical diagnostics and imaging, optical-based smart biosensors, and miniaturized systems. He has written over 85 peer-reviewed articles and book chapters, and books, and holds several patents.',
                'Before joining NYUAD, Zam was an Assistant Professor in Medical Laser and Optics at the Department of Biomedical Engineering, University of Basel, Switzerland, where he founded the Biomedical Laser and Optics Group (BLOG) and co-established the MIRACLE II flagship project. Prior to that, he held research positions at the University of Waterloo, Waterloo, ON, Canada, the National University of Ireland Galway, Galway, Ireland, the Toronto Metropolitan University (formerly known as Ryerson University), Toronto, ON, Canada, and the University of California at Davis, Davis, CA, USA.',
            ],
        ],
        [
            'slug' => 'kanawade',
            'name' => 'Dr.-Ing. Rajesh Kanawade',
            'role' => 'Keynote',
            'institution' => 'CSIR-National Chemical Laboratory, Pune, India',
            'topic' => null,
            'photo' => '/photos/speakers/keynotes/Picture5.jpg',
            'bio' => [
                'Dr.-Ing. Rajesh Kanawade is the head of the Hydrogen Engineering & Photonics Sensor Group, under the Physical and Materials Chemistry Division, CSIR–National Chemical Laboratory (CSIR-NCL), Pune, India. He obtained his M.Sc. in Physics (2006) from Savitribai Phule Pune University and his Doctor of Engineering (Dr.-Ing.) in 2013 from Friedrich-Alexander University Erlangen–Nürnberg, Germany.',
                'His interdisciplinary research integrates optics, photonics, spectroscopy, biomedical imaging, laser instrumentation, Raman spectroscopy, laser-induced breakdown spectroscopy (LIBS), fiber-optic sensing, and optical diagnostics for healthcare and industrial applications. His work has produced important advances in biomedical spectroscopy and laser-based sensing technologies and has been published in leading journals in photonics and biophotonics.',
            ],
        ],
        [
            'slug' => 'chaompluk',
            'name' => 'Assoc. Prof. Dr. Piyasak Chaumpluk',
            'role' => 'Keynote',
            'institution' => 'UniversityChulalongkorn, Thailand',
            'topic' => null,
            'photo' => '/photos/speakers/keynotes/Picture6.jpg',
            'bio' => [
                'Associate Prof. Dr. Piyasak Chaumpluk is currently a faculty member at the Genetics Program, Department of Botany, Faculty of Science, Chulalongkorn University, where he also serves as the Head of the Laboratory of Plant Transgenic Technology and Biosensor. His research integrates plant science and genetics with cutting-edge biosensor technology to address challenges in agriculture and biosciences.',
                'He finished his B.Sc. at Khon Kaen University, and earned his Master of Agriculture (Plant Pathology) in 1990 and his Doctor of Agriculture (1996), both from Kyoto University. Prior to his current position, he gained valuable international experience as a Researcher at the Iwate Biotechnology Research Center in Japan, where he worked for three years.',
                'His diverse research interests encompass lab-on-a-chip technology, DNA aptamers for novel detection methods, bio/nano sensors for nucleic acid detection in agriculture and biosciences, in vitro cultivation of plants, and enhancing the value of local genetic resources through genetic and biochemical analysis.',
                'For his outstanding contributions to science and innovation, he has received several prestigious international honors, including the United Kingdom Leadership Award (Knight Level) in 2019 and the Brussels Eureka Innova Award (Chevalier Level) in 2016.',
            ],
        ],
        [
            'slug' => 'anto-satriyo-nugroho',
            'name' => 'Prof. Dr. Eng. Anto Satriyo Nugroho',
            'role' => 'Keynote',
            'institution' => 'AI&C RC BRIN, Indonesia',
            'topic' => null,
            'photo' => '/photos/speakers/keynotes/Picture13.jpg',
            'bio' => [
                'Prof. Dr. Eng. Anto Satriyo Nugroho is a Research Professor in Artificial Intelligence and currently is the Head of Research Center for Artificial Intelligence and Cyber Security of the National Research and Innovation Agency (BRIN).',
                'He got his B.Eng (1995), M.Eng. (2000), and Dr.Eng. (2003) in Electrical and Computer Engineering, all were from the Nagoya Institute of Technology. His research interests are devoted to biometrics, pattern recognition, and image processing.',
                'He has authored 84 Scopus-indexed papers, with a current h-index of 12. His Scopus ID is 6701506291 and his ORCID ID is 0000-0002-5457-8786.',
            ],
        ],
    ],
    'submission' => [
        'body' => 'ISPhOA 2026 welcomes original and unpublished research papers. All submitted full paper (2 to 6 max pages) will undergo double-blind peer review by our reputable reviewers committee. All accepted and presented papers will be published in the Proceeding of SPIE (Scopus Indexed).',
        'publisher' => [
            'logo' => '/brand/spie.png',
            'indexed' => 'Scopus Indexed',
            'note' => 'Accepted & Presented Papers',
        ],
        'policy' => [
            [
                'title' => 'SPIE Proceedings',
                'desc' => 'Published in Proceedings of SPIE, Scopus indexed',
            ],
            [
                'title' => 'Double-Blind Review',
                'desc' => 'Rigorous peer review by our reputable reviewers committee',
            ],
            [
                'title' => 'Full Paper',
                'desc' => '2 to 6 pages including references, original and unpublished work',
            ],
            [
                'title' => 'DOI Assignment',
                'desc' => 'Every accepted and presented paper receives a permanent DOI',
            ],
        ],
        'formats' => [
            'Keynote Lectures',
            'Parallel Sessions',
            'Poster Sessions',
            'Industry Forum',
            'Online Access',
            'Cultural Events',
        ],
    ],
    'submissionInfo' => [
        'publication' => [
            'heading' => 'Paper Publication',
            'lead' => 'After a careful double-blind review process, all accepted papers, subject to proper registration and presentation at the seminar, will be published in the following proceedings:',
            'proceedings' => 'ISPhOA 2026 Proceedings of SPIE',
            'indexing' => 'Proceedings volumes are submitted for evaluation to be indexed in Scopus, Web of Science, Ei Compendex, Inspec, Google Scholar, the Astrophysical Data System (ADS) and Crossref.',
            'points' => [
                'Manuscripts are officially published after the seminar, and every published paper is archived in the SPIE Digital Library with a permanent DOI.',
                'Only manuscripts presented at the seminar and received according to the guidelines and due dates are published. Papers and posters not presented will not appear in the proceedings.',
                'Chairs and editors may require revision before approving publication, and reserve the right to reject any manuscript that does not meet the standards of a scientific publication. Their decision is final.',
            ],
        ],
        'plagiarism' => [
            'heading' => 'Policy on Plagiarism',
            'body' => 'ISPhOA is utterly intolerant of plagiarism. Submitted papers are expected to contain original work executed by the authors, with adequate, proper and scholarly citation of the work of others, and results are expected to be obtained theoretically or experimentally rather than generated using AI. It is the job of the authors to clearly identify both their own contributions and the published results or techniques on which they depend or build, and to describe the extent of any AI technology used in preparing the manuscript. Reviewers are charged to ensure these standards are met, and the committee reserves the right to reject any paper where the terms of this statement are not honoured.',
        ],
        'instructions' => [
            'heading' => 'Instruction to Authors',
            'body' => 'English is the official language of the seminar, so prepare both the manuscript and the oral presentation in English. Authors are invited to submit a full paper of original, unpublished work in the seminar paper format, including tables, figures and references. Full papers are 2 pages minimum and 6 pages maximum including references, and must be submitted as PDF. The full paper is published in the proceedings and must also be presented at the seminar.',
        ],
        'templates' => [
            'heading' => 'Paper Template',
            'lead' => 'Submitted papers should be formatted according to the following template:',
        ],
        'method' => [
            'heading' => 'Paper Submission',
            'intro' => 'For managing the submission and review process, ISPhOA uses the EasyChair conference management system.',
            'accountUrl' => 'https://easychair.org/docs/account_create',
            // The ISPhOA 2026 submission page on EasyChair. When null, step 4
            // names the link without making it one.
            'submitUrl' => 'https://easychair.org/conferences/?conf=isphoa2026',
        ],
        'policies' => [
            'heading' => 'Review & Publication Policies',
            'groups' => [
                [
                    'title' => 'Review criteria',
                    'items' => [
                        'Reviewers verify that every published item is technically sound, contains new and original research content, is non-commercial in nature, includes sufficient technical data to explain the results and support the conclusions, carries adequate and appropriate references, and is clearly and understandably presented.',
                        'Privileged information or ideas obtained through review access to abstracts and manuscripts before presentation and publication must be kept confidential and must not be used for competitive gain.',
                    ],
                ],
                [
                    'title' => 'AI tools and authorship',
                    'items' => [
                        'Because authorship requires accountability for the submitted work, Large Language Models such as ChatGPT cannot be listed as authors. Authors remain fully responsible for the content of their manuscript, including any part produced by an AI tool.',
                        'Disclose any AI tool used, and how it was used, in the Materials and Methods section. Use for language and grammar clean-up should be disclosed in the Acknowledgements.',
                        'The use of the Lena (Lenna) image is prohibited. Use another suitable image to illustrate or compare image-processing algorithms.',
                    ],
                ],
                [
                    'title' => 'Presentation, cancelation and no-shows',
                    'items' => [
                        'If unforeseeable circumstances prevent you from attending, arrange for a co-author or colleague who is attending to give the presentation. If no substitute presenter is possible, contact the Seminar Secretariat as early as possible to cancel.',
                        'Arbitrary cancelation or no-show after the programme has been finalised is recorded in the presenting author\'s record, and the paper will not be published.',
                    ],
                ],
                [
                    'title' => 'Rights and permissions',
                    'items' => [
                        'Authors retain copyright of all scientific material. A Permission to Publish and Distribute Agreement is required, granting the publisher the licence to publish, archive and distribute the paper.',
                        'Prior to submission, authors must obtain all clearances, authorizations and licences needed for submission and publication, and all reused work must be properly cited.',
                        'Authors and their employers may post an author-prepared or the officially published version on a repository they control, provided the posting is non-commercial, free to users, carries the correct attribution and citation, and links to the DOI of the official version. This does not extend to third-party sites such as ResearchGate, Academia.edu or YouTube.',
                    ],
                ],
            ],
        ],
    ],
    'submissionWindow' => [
        'opensAt' => '2026-06-01T00:00:00+07:00',
        'closesAt' => '2026-10-15T23:59:59+07:00',
        'opensDisplay' => '01 Jun 2026',
    ],
    'supporters' => [
        [
            'name' => 'Himpunan Optika Indonesia (HOI) · Indonesian Optical Society (InOS)',
            'logo' => '/brand/inos-hoi.png',
        ],
    ],
    'templateDownloads' => [
        [
            'label' => 'Seminar Proceedings',
            'files' => [
                [
                    'format' => 'DOC',
                    'href' => '/documents/ProcSPIETemplate_Letter.docx',
                ],
                [
                    'format' => 'LaTeX',
                    'href' => '/documents/spie-proceedings-style.zip',
                ],
                [
                    'format' => 'PDF Sample',
                    'href' => '/documents/ProcSPIETemplate_Letter.pdf',
                ],
            ],
        ],
        [
            'label' => 'Submission Guidelines',
            'files' => [
                [
                    'format' => 'DOCX',
                    'href' => '/documents/ISPhOA-2026-Paper-Submission-Guidelines.docx',
                ],
            ],
        ],
        [
            'label' => 'Ethical Publishing',
            'files' => [
                [
                    'format' => 'PDF',
                    'href' => '/documents/SPIE-Guidelines-for-Ethical-Publishing.pdf',
                ],
            ],
        ],
    ],
    'tracks' => [
        [
            'n' => '01',
            'title' => 'Halal Authentication Technologies',
            'desc' => 'Optical and photonic methods for non-destructive halal verification, food authentication, and material purity testing.',
        ],
        [
            'n' => '02',
            'title' => 'Life-sciences & Medical Related Technologies',
            'desc' => 'Light-based innovations applied to biomedical diagnostics, therapy, imaging, and life science research.',
        ],
        [
            'n' => '03',
            'title' => 'Agriculture, Livestock, and Fisheries',
            'desc' => 'Optical sensing and photonic systems for precision agriculture, aquaculture monitoring, and livestock management.',
        ],
        [
            'n' => '04',
            'title' => 'Manufacturing and Industries',
            'desc' => 'Laser processing, optical inspection, photonic quality control, and smart manufacturing applications.',
        ],
        [
            'n' => '05',
            'title' => 'Communication & Multimedia',
            'desc' => 'Optical fiber communications, Li-Fi, photonic networks, and light-based multimedia transmission systems.',
        ],
        [
            'n' => '06',
            'title' => 'Energy-related Sectors',
            'desc' => 'Solar energy harvesting, photovoltaics, optical energy storage, and light-driven energy conversion technologies.',
        ],
        [
            'n' => '07',
            'title' => 'Transportation-related Technologies',
            'desc' => 'LiDAR for autonomous vehicles, optical traffic sensing, aerospace photonics, and navigation systems.',
        ],
        [
            'n' => '08',
            'title' => 'Other Light-based Related Innovations',
            'desc' => 'All other original research on light-based technology innovations are also welcome.',
        ],
    ],
    'venue' => [
        'eyebrow' => 'Venue',
        'name' => 'UIN Mahmud Yunus Batusangkar',
        'addressLines' => [
            'Gedung Kuliah Terpadu (GKT), Kampus 2',
            'Jl. Raya Batusangkar - Padang Panjang KM. 7',
            'Nagari Parambahan, Kec. Lima Kaum',
            'Kab. Tanah Datar, Sumatera Barat 27264, Indonesia',
        ],
        'street' => 'Jl. Raya Batusangkar - Padang Panjang KM. 7, Parambahan',
        'postalCode' => '27264',
        'mapQuery' => 'Gedung Kuliah Terpadu UIN MY Batusangkar, Jl. Raya Padang Panjang-Batusangkar, Parambahan, Kec. Lima Kaum, Kabupaten Tanah Datar',
        'coords' => [
            'lat' => -0.4635357,
            'lng' => 100.5355763,
        ],
        'placeId' => 'ChIJ-1M6EwAt1S8R0cR80CrsL0E',
    ],
    /*
    |--------------------------------------------------------------------------
    | Travel Information
    |--------------------------------------------------------------------------
    |
    | The second Venue tab: what there is to see around Batusangkar and across
    | West Sumatra for participants who can stay a little longer. Each entry
    | leads with its photographs: one sheet per destination, several views laid
    | out side by side, set across the full width of the page.
    |
    */
    'travel' => [
        'heading' => 'Beyond the Seminar: Discover Batusangkar and the Wonders of West Sumatra',
        'standfirst' => 'An invitation to explore Minangkabau culture, remarkable landscapes, and memorable local experiences during your visit to ISPhOA 2026.',
        'intro' => [
            'Every journey begins with a purpose, but its most lasting memories often come from unexpected encounters along the way. Beyond the presentations and scientific discussions, take a moment to follow a village path, savour local flavours, and hear the stories of the people who call this region home. Let curiosity guide you beyond the seminar hall and into the heart of West Sumatra.',
            'Attending ISPhOA 2026 in Batusangkar on 2–3 December 2026 offers an opportunity to combine scientific exchange with a journey through West Sumatra. Between traditional villages, distinctive architecture, scenic lakes, and dramatic valleys, there is much to discover beyond the seminar venue.',
            'For international visitors, Batusangkar is a rewarding starting point for exploring Minangkabau heritage. A short excursion can introduce you to an impressive palace or a historic village, while a few additional days open up opportunities to visit highland towns, coastal destinations, and a UNESCO World Heritage Site.',
            'ISPhOA 2026 offers an opportunity to make new scientific connections while discovering a region rich in stories, craftsmanship, and landscapes. Whether you have a few spare hours or several additional days, Batusangkar and West Sumatra invite you to stay a little longer and explore.',
        ],
        'note' => 'The following guide presents several beautiful and intriguing destinations and experiences to consider when planning your visit. Suggested visit durations are planning recommendations, rather than confirmed travel times. Check the opening hours, admission fees, road access, and activity schedules closer to your visit.',
        'destinations' => [
            [
                'n' => 1,
                'slug' => 'istano-basa-pagaruyung',
                'title' => 'Istano Basa Pagaruyung',
                'subtitle' => 'An Introduction to Minangkabau Heritage',
                'photo' => ['src' => 'photos/travel/istano-basa-pagaruyung.jpg', 'w' => 968, 'h' => 181],
                'alt' => 'Istano Basa Pagaruyung, the reconstructed Minangkabau royal palace near Batusangkar, with its curved rooflines against a green hillside.',
                'body' => [
                    'With its soaring, curved rooflines, colourful carvings, and green hillside backdrop, Istano Basa Pagaruyung is one of the most distinctive sights near Batusangkar. Its architecture offers an engaging introduction to the cultural traditions of the Minangkabau people.',
                    'The present building is a reconstruction of the royal palace. A visit is an opportunity to appreciate traditional architectural forms and learn about the history and customs associated with the former Pagaruyung Kingdom. The palace is approximately five kilometres from Batusangkar.',
                ],
                'facts' => [
                    'Location' => 'Jalan Sutan Alam Bagagarsyah, Nagari Pagaruyung, Tanjung Emas District, Tanah Datar Regency.',
                    'Things to do' => 'Explore areas open to visitors, admire the carvings and architectural details, learn about Minangkabau customs with a local guide, and take photographs. Traditional costume photography may be available through local providers.',
                    'Suggested time' => '1–2 hours.',
                    'Why visit?' => 'An accessible and visually striking introduction to the cultural heritage of the seminar\'s host region.',
                ],
            ],
            [
                'n' => 2,
                'slug' => 'nagari-tuo-pariangan',
                'title' => 'Nagari Tuo Pariangan',
                'subtitle' => 'Village Life on the Slopes of Mount Marapi',
                'photo' => ['src' => 'photos/travel/nagari-tuo-pariangan.jpg', 'w' => 968, 'h' => 208],
                'alt' => 'Nagari Tuo Pariangan on the slopes of Mount Marapi, with rice fields and traditional rumah gadang houses.',
                'body' => [
                    'Pariangan invites visitors to slow down and enjoy a landscape of rice fields, traditional houses, village paths, and a historic mosque. Situated on the lower slopes of Mount Marapi, approximately fifteen kilometres from Batusangkar, the village holds an important place in Minangkabau origin traditions.',
                    'Its appeal lies in the relationship between the landscape and everyday village life. A guided walk can reveal stories and architectural details that might otherwise go unnoticed. Local accounts of the village\'s origins are best understood as part of its living cultural traditions.',
                ],
                'facts' => [
                    'Location' => 'Nagari Pariangan, Pariangan District, Tanah Datar Regency.',
                    'Things to do' => 'Take a guided village walk, enjoy views of the rice fields, discover traditional rumah gadang houses, visit the area around Ishlah Mosque in accordance with local rules, and meet residents respectfully.',
                    'Suggested time' => '2–3 hours.',
                    'Why visit?' => 'A picturesque historic village where architecture, agriculture, and community life can be experienced together.',
                ],
            ],
            [
                'n' => 3,
                'slug' => 'batu-batikam',
                'title' => 'Batu Batikam',
                'subtitle' => 'A Small Site with a Meaningful Story',
                'photo' => ['src' => 'photos/travel/batu-batikam.jpg', 'w' => 968, 'h' => 264],
                'alt' => 'The pierced stone of Batu Batikam and the stone arrangement surrounding it, Lima Kaum.',
                'body' => [
                    'Batu Batikam is a modest heritage site whose significance becomes clearer through the stories associated with it. The pierced stone is linked in local legend to Datuak Parpatiah Nan Sabatang and to the importance of peace and deliberation in Minangkabau society.',
                    'For visitors interested in cultural interpretation, this is a worthwhile short stop. A knowledgeable guide can explain how places, objects, and oral traditions help communities pass on their values.',
                ],
                'facts' => [
                    'Location' => 'Jorong Dusun Tuo, Nagari Limo Kaum, Lima Kaum District, Tanah Datar Regency.',
                    'Things to do' => 'View the pierced stone and surrounding stone arrangement, listen to local accounts of its significance, and photograph the site.',
                    'Suggested time' => '30–45 minutes, combined with other nearby attractions.',
                    'Why visit?' => 'An introduction to the symbolic and storytelling traditions of Minangkabau culture.',
                ],
            ],
            [
                'n' => 4,
                'slug' => 'pacu-jawi',
                'title' => 'Pacu Jawi',
                'subtitle' => 'A Memorable Agricultural Tradition',
                'photo' => ['src' => 'photos/travel/pacu-jawi.jpg', 'w' => 968, 'h' => 235],
                'alt' => 'A Pacu Jawi cattle race through a muddy rice field, with a jockey balancing behind a pair of cattle.',
                'body' => [
                    'Few local experiences are as visually dramatic as Pacu Jawi. A pair of cattle runs through a muddy rice field while a jockey balances behind them, creating a scene of movement, skill, and flying mud.',
                    'Associated with the period after the rice harvest, Pacu Jawi is an agricultural tradition that has also attracted international photographers. Events rotate between villages, particularly in Pariangan, Rambatan, Lima Kaum, and Sungai Tarab districts.',
                ],
                'facts' => [
                    'Location' => 'Host villages and rice fields in Tanah Datar Regency. The exact location depends on the local event schedule.',
                    'Things to do' => 'Watch from designated spectator areas, photograph the action, and learn about the tradition with a local guide.',
                    'Suggested time' => 'Allow half a day if an event coincides with your visit.',
                    'Why visit?' => 'A distinctive cultural experience that connects visitors with the region\'s agricultural heritage.',
                ],
            ],
            [
                'n' => 5,
                'slug' => 'lake-singkarak',
                'title' => 'Lake Singkarak',
                'subtitle' => 'A Relaxing Lakeside Escape',
                'photo' => ['src' => 'photos/travel/lake-singkarak.jpg', 'w' => 968, 'h' => 179],
                'alt' => 'Lake Singkarak seen from its shore, with hills rising behind the water.',
                'body' => [
                    'Surrounded by hills, Lake Singkarak offers a peaceful setting for a break from a busy seminar programme. Its broad views are well suited to a leisurely meal, photography, or conversation with fellow participants.',
                    'The lake extends across Tanah Datar and Solok regencies. Selecting a specific lakeside stop is therefore important when planning an efficient excursion from Batusangkar.',
                ],
                'facts' => [
                    'Location' => 'Lake Singkarak, spanning Tanah Datar and Solok regencies. Possible approaches from Batusangkar include the Ombilin–Rambatan area and lakeside locations in Batipuh Selatan.',
                    'Things to do' => 'Enjoy the views, take photographs, have a lakeside meal, and sample local preparations of bilih fish where available.',
                    'Suggested time' => '1–2 hours, potentially included in a half-day excursion.',
                    'Why visit?' => 'A gentle, scenic outing that provides time to relax and enjoy the landscape.',
                ],
            ],
            [
                'n' => 6,
                'slug' => 'pandai-sikek',
                'title' => 'Pandai Sikek',
                'subtitle' => 'Discover the Craft of Songket Weaving',
                'photo' => ['src' => 'photos/travel/pandai-sikek.jpg', 'w' => 968, 'h' => 202],
                'alt' => 'A weaver at a traditional loom in a songket weaving house in Pandai Sikek.',
                'body' => [
                    'A visit to Pandai Sikek reveals the patience and skill behind traditional Minangkabau textiles. Watching a weaver at work gives visitors a deeper appreciation of songket than browsing finished fabrics alone.',
                    'For those interested in art, design, or craftsmanship, a weaving-house visit can be a rewarding addition to a journey towards Bukittinggi. Demonstrations and group visits should be arranged in advance.',
                ],
                'facts' => [
                    'Location' => 'Nagari Pandai Sikek, X Koto District, Tanah Datar Regency, in the area between Padang Panjang and Bukittinggi.',
                    'Things to do' => 'Visit a weaving house, observe the weaving process, learn about decorative motifs, and purchase locally made crafts.',
                    'Suggested time' => '1–2 hours.',
                    'Why visit?' => 'An opportunity to meet artisans and learn about skills passed down through generations.',
                ],
            ],
            [
                'n' => 7,
                'slug' => 'bukittinggi',
                'title' => 'Bukittinggi',
                'subtitle' => 'Jam Gadang and Pasar Ateh',
                'photo' => ['src' => 'photos/travel/bukittinggi.jpg', 'w' => 968, 'h' => 177],
                'alt' => 'The Jam Gadang clock tower in central Bukittinggi, with the square and market area around it.',
                'body' => [
                    'Bukittinggi combines the atmosphere of a highland town with a recognisable landmark and lively shopping areas. At its centre stands Jam Gadang, the city\'s clock tower, close to Pasar Ateh.',
                    'The central area is well suited to a relaxed walk, souvenir shopping, and sampling local food. It also combines naturally with a visit to nearby Sianok Canyon.',
                ],
                'facts' => [
                    'Location' => 'The Jam Gadang–Pasar Ateh area in central Bukittinggi.',
                    'Things to do' => 'Photograph the clock tower, explore the city centre, browse local crafts and food products, and enjoy regional cuisine.',
                    'Suggested time' => '2–3 hours for the city centre; allow a full-day excursion when combined with Sianok Canyon.',
                    'Why visit?' => 'A convenient combination of landmarks, shopping, food, and everyday urban life.',
                ],
            ],
            [
                'n' => 8,
                'slug' => 'sianok-canyon',
                'title' => 'Sianok Canyon',
                'subtitle' => 'Dramatic Scenery Close to the City',
                'photo' => ['src' => 'photos/travel/sianok-canyon.jpg', 'w' => 966, 'h' => 358],
                'alt' => 'Sianok Canyon near Bukittinggi, with steep cliffs above a green valley floor.',
                'body' => [
                    'Sianok Canyon, locally known as Ngarai Sianok, offers impressive views of steep cliffs and a green valley near Bukittinggi. It provides a striking contrast to the city\'s streets and markets.',
                    'Visitors can appreciate the scenery from established viewpoints without committing to a demanding walk. Longer walks can be considered separately, depending on access, weather, and individual preferences.',
                ],
                'facts' => [
                    'Location' => 'Along the boundary between Bukittinggi and Agam Regency. Taman Panorama on Jalan Panorama, Bukittinggi, is one established viewing location.',
                    'Things to do' => 'Enjoy the canyon from designated viewpoints, take landscape photographs, and join guided walks on routes confirmed as open.',
                    'Suggested time' => '1–2 hours for a viewpoint visit; longer for walking excursions.',
                    'Why visit?' => 'Remarkable scenery that can be incorporated into a visit to Bukittinggi.',
                ],
            ],
            [
                'n' => 9,
                'slug' => 'harau-valley',
                'title' => 'Harau Valley',
                'subtitle' => 'Rice Fields, Cliffs, and Waterfalls',
                'photo' => ['src' => 'photos/travel/harau-valley.jpg', 'w' => 968, 'h' => 481],
                'alt' => 'Harau Valley, with rice fields on the valley floor below towering rock faces and a waterfall.',
                'body' => [
                    'Harau Valley brings together some of West Sumatra\'s most photogenic scenery: rice fields on the valley floor, towering rock faces, and waterfalls descending from the cliffs.',
                    'A visit can be as simple as a gentle walk and a few scenic stops, or it can become a longer stay in a valley guesthouse. For seminar participants travelling with partners or family members, Harau offers an appealing opportunity to spend time outdoors.',
                ],
                'facts' => [
                    'Location' => 'Harau District, Lima Puluh Kota Regency, near Payakumbuh. Visitor areas include Tarantang, Aka Barayun, and Sarasah Bunta.',
                    'Things to do' => 'Walk through visitor areas, photograph the cliffs and rice fields, visit waterfalls that are open to the public, and stay overnight in local accommodation.',
                    'Suggested time' => 'A full-day excursion; one overnight stay allows a more relaxed visit.',
                    'Why visit?' => 'A memorable natural setting for landscape photography and a change of pace after the seminar.',
                ],
            ],
            [
                'n' => 10,
                'slug' => 'lake-maninjau',
                'title' => 'Lake Maninjau',
                'subtitle' => 'Views Across a Volcanic Caldera',
                'photo' => ['src' => 'photos/travel/lake-maninjau.jpg', 'w' => 968, 'h' => 512],
                'alt' => 'Lake Maninjau seen from high ground, enclosed by the slopes of its volcanic caldera.',
                'body' => [
                    'Lake Maninjau offers a different lakeside experience, with a broad expanse of water enclosed by the slopes of a volcanic caldera. Views from higher ground reveal the scale of the landscape, while the lakeshore encourages a slower pace.',
                    'This destination is particularly suitable for visitors who can extend their stay and prefer an unhurried journey through the highlands.',
                ],
                'facts' => [
                    'Location' => 'Tanjung Raya District, Agam Regency. Elevated viewpoints can be considered around the Embun Pagi–Kelok 44 approach.',
                    'Things to do' => 'Enjoy panoramic views, take photographs, relax by the lake, and explore nearby communities respectfully.',
                    'Suggested time' => 'A day trip from a base in Bukittinggi, or an additional overnight stay.',
                    'Why visit?' => 'Expansive lake views and a scenic journey through the surrounding hills.',
                ],
            ],
            [
                'n' => 11,
                'slug' => 'sawahlunto',
                'title' => 'Sawahlunto',
                'subtitle' => 'Industrial Heritage with a Human Story',
                'photo' => ['src' => 'photos/travel/sawahlunto.jpg', 'w' => 964, 'h' => 420],
                'alt' => 'Historic buildings and mining infrastructure in the town centre of Sawahlunto.',
                'body' => [
                    'For participants interested in science, engineering, and the history of technology, Sawahlunto offers a particularly relevant excursion. Its buildings and industrial remains tell the story of an interconnected system of mining, transport, and trade.',
                    'The Ombilin Coal Mining Heritage of Sawahlunto was inscribed on the UNESCO World Heritage List in 2019. The property includes mining facilities, the mining town, railway infrastructure, and coastal facilities. Its significance also encompasses the lives of workers, including those subjected to forced labour.',
                ],
                'facts' => [
                    'Location' => 'Sawahlunto\'s historic town centre, particularly the Lembah Segar area. The full UNESCO property extends across a much wider region.',
                    'Things to do' => 'Take a guided heritage walk, explore historic buildings, and visit operating museums. Potential stops include Museum Goedang Ransoem and the Railway Museum, subject to confirmed opening arrangements.',
                    'Suggested time' => 'A full-day excursion.',
                    'Why visit?' => 'A compelling connection between engineering, industrial development, and social history.',
                ],
            ],
            [
                'n' => 12,
                'slug' => 'alahan-panjang',
                'title' => 'Alahan Panjang and the Twin Lakes',
                'subtitle' => 'A Highland Retreat',
                'photo' => ['src' => 'photos/travel/alahan-panjang.jpg', 'w' => 968, 'h' => 295],
                'alt' => 'Highland farmland and lake views in the Alahan Panjang and Danau Kembar area of Solok Regency.',
                'body' => [
                    'The Alahan Panjang area introduces visitors to another side of West Sumatra: highland settlements, agricultural landscapes, and scenic lakes.',
                    'Lake Diatas and Lake Dibawah are commonly known as the Twin Lakes, or Danau Kembar. They are separate lakes, so an itinerary should identify the intended viewpoints and stops rather than treating them as a single destination.',
                ],
                'facts' => [
                    'Location' => 'The Alahan Panjang area in Lembah Gumanti District and the Danau Kembar area, Solok Regency.',
                    'Things to do' => 'Enjoy lake views, photograph agricultural landscapes, visit local businesses, and relax in highland accommodation.',
                    'Suggested time' => 'An additional 1–2 days.',
                    'Why visit?' => 'A quieter highland experience that complements visits to the region\'s towns, palaces, and coast.',
                ],
            ],
            [
                'n' => 13,
                'slug' => 'padang',
                'title' => 'Padang',
                'subtitle' => 'Heritage, Food, and the Indian Ocean',
                'photo' => ['src' => 'photos/travel/padang.jpg', 'w' => 968, 'h' => 362],
                'alt' => 'The old-town waterfront of Padang along Batang Arau, with the coast and the Indian Ocean beyond.',
                'body' => [
                    'Padang is a useful place to begin or conclude a visit to West Sumatra. Its museums, historic waterfront areas, coastal scenery, and food offer several ways to enjoy time before or after travelling to Batusangkar.',
                    'Minangkabau International Airport, identified by the airport code PDG, is the main air gateway to the region. A stay in Padang can provide time for sightseeing alongside arrival or departure arrangements.',
                ],
                'facts' => [
                    'Location' => 'Suggested stops include Museum Adityawarman on Jalan Diponegoro, the old-town area around Batang Arau and Pondok, and Padang Beach.',
                    'Things to do' => 'Visit the museum, walk through the historic district, enjoy the beach towards sunset, and discover Minangkabau cuisine.',
                    'Suggested time' => 'Half a day to a full day, in addition to the journey to or from Batusangkar.',
                    'Why visit?' => 'An introduction to regional culture through food, architecture, and coastal city life.',
                ],
            ],
            [
                'n' => 14,
                'slug' => 'mandeh',
                'title' => 'Mandeh',
                'subtitle' => 'A Coastal Extension to Your Visit',
                'photo' => ['src' => 'photos/travel/mandeh.jpg', 'w' => 968, 'h' => 481],
                'alt' => 'The bays and small islands of the Mandeh area, seen from a coastal viewpoint in Pesisir Selatan.',
                'body' => [
                    'The Mandeh area offers a change of scenery after time in the highlands. Bays, small islands, and coastal viewpoints create opportunities for a relaxed excursion by land and boat.',
                    'Local providers offer island visits and activities such as snorkelling. The exact route and available activities depend on the operator, sea conditions, and weather.',
                ],
                'facts' => [
                    'Location' => 'The Mandeh area, Koto XI Tarusan District, Pesisir Selatan Regency. Boat departure points should be agreed with the selected operator.',
                    'Things to do' => 'Enjoy coastal viewpoints, take a boat excursion, visit islands, and snorkel where conditions and services permit.',
                    'Suggested time' => 'A full day from a base in Padang. Visitors starting in Batusangkar should consider an overnight stay in Padang as part of the extension.',
                    'Why visit?' => 'A tropical coastal experience that complements West Sumatra\'s cultural and highland attractions.',
                ],
            ],
        ],
    ],
];
