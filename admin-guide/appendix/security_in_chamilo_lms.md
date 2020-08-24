# Security in Chamilo LMS

While Chamilo is free software \(and thus anyone can access its code\), you can rest assure that security is a very important element for the development team and the official providers. This section gives you a few facts about security that you might be interested in knowing if you ever have to defend Chamilo against proprietary software.

First things first. Proprietary software generally means that the source code is hidden, or “obfuscated” by compilation. This means that you cannot “just” download the application and look through the code.

Open Source and Free Software software means that you can see the source code, which also means, in theory, that you can more easily find its weaknesses and, eventually, exploit them.

There's something inherently wrong about the conception that people have about proprietary software, though: it is **not difficult** to get to the source code. As many articles will explain, there are many de-compilation tools that will allow you to analyse the code of any compiled application.

Another case is when you use web applications, where users do not have access to the code at all. Free Software provides this code for download, which means a free software web application is more easily analysed than a closed source application. And that part is true.

The second huge misconception is that an application that doesn't reveal its source is more secure than an application that does. This isn't true, and comes, in a way, from the “web 2.0” effect: a system with open sources is more easily reviewed by people with interests in making it more secure, and the sharing of common security concepts across the different open source projects make it easier to protect a piece of software from malicious attacks.

Let's analyse this with facts: on Secunia's \(an agency specialized in software security\) website, you can find all security vulnerabilities reported publicly. Every report, when left unsolved long enough, gets a unique “CVE” code, which identifies the vulnerability and allows references to it later on.

Chamilo, since its creation and until now, has never laster more than 4 calendar days to solve a new security flaw reported to them. You can check the report here: [http://secunia.com/advisories/product/34198/](http://secunia.com/advisories/product/34198/)

A proprietary product in the same category, for example Blackboard® Learn 9.x \(it's latest version\), has yet to fix a security issue published in July 2012 \(8 months ago\): [http://secunia.com/advisories/product/41718/?task=advisories](http://secunia.com/advisories/product/41718/?task=advisories). It's Academic Suite still suffrs from a security flaw reported in July 2008: [http://secunia.com/advisories/product/18189/?task=advisories](http://secunia.com/advisories/product/18189/?task=advisories)

The code of Blackboard is not only compiled: it is also not downloadable, so attackers cannot access it directly. Nevertheless, security flaws can still be detected, reported and remain unfixed for years.

The strength of the security chain is the one of its weakest link, and most of the time this link is the human laziness. We have never, so far, received any report of security flaws being exploited in Chamilo, but we did receive several reports of password theft, provoked by a bad infrastructure or just by distraction.

In conclusion, Chamilo is just as safe, if not safer, than equivalent proprietary software. If you want to avoid security issues, make sure you use password that are difficult to guess, and to always connect on a secure network. Check the SSL chapter on page 88 for a few tips.

