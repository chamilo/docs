# Gebruik case

Let's imagine your institution offers two careers: medicine and veterinary. These two careers last 5 years each. You are in August 2011, preparing the classes that will start in September 2011.

From year one \(2011\), you create promotion 2016 for both medicine \(PROMMED2016\) and veterinary \(PROMVET2016\).

Let's re-use the previous schema as a reference :

![](../../../.gitbook/assets/graficos92%20%281%29.png)Illustration 76: Courses, sessions, promotions and careers

These two promotions will be the result of 5 years of study \(let's agree that the minimum period of course is one year\). You will thus have 5 **periods** of one year each, which lead to a promotion in 2016.

These periods are fixed and can thus be shared between the two careers. In your platform, these are _categories of sessions_, which you will name respectively _2011-2012, 2012-2013, 2013-2014, 2014-2015,_ and _2015-2016._

Of course, you can give them other names, as you would prefer to see them. Periods are simply classifications based on a time information. Nothing more. They aren't used to sort anything, either.

Within each period, your teachers will teach classes. Some courses are common to both the medicine and the veterinary careers, as the general biology course \(BIOGEN\), for example, but the course coaches who will be teaching still teach these students in separate groups depending on the career \(that's just a matter of space in the classroom, really\).

If a course is taught several years in a row with almost no modification, you don't want students results of the previous year to stack into the course history. You'd like to have a clear view on this year's students.

This is why you use a _session_. This session will spread one academical year and group students from the 2016 promotion of veterinary \(PROVET2016\), during the period 2011-2012.

These students will also follow courses of canine biology, medical ethics and medical laws. This is why you'd like to re-use this structure in other opportunities.

So you have all the variables required to establish the complete structure:

1. create a career \(VET\)
2. create a promotion \(PROMVET2016\)
3. create a period \(2011-2\)
4. create or select the courses for this promotion in 2011 \(BIOGEN, BIOCAN, ETHMED, DROMED\)
5. create a session that contains these courses \(VET2011-2-AAA\)
6. subscribe a session coach, who will deal with coordination
7. subscribe a course coach for each course in this session, they will help with practices
8. finally, subscribe the students to the session

This way, you allow your students to have access to their current courses, and also to have access later on to their history of previous courses \(visibility depends on sessions settings\).

On the administrative side, you have the whole academic structure and you'll be able to replicate the whole promotion in only one click when you start the next year...

