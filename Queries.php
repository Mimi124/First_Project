

 Course::where ('name','like','Software Engineering 3')->get(); 
 Student::where ('firstname','like','J%')->get();
 $students = DB::table('Students')->max('date_of_birth');
 $courses = DB::table('courses')->count();

$programmes = DB::table('programmes')->min('duration');
$programmes = DB::table('programmes')->avg('duration');

$students = DB::table('students')->sum('student_id');

Programmes::whereIn('duration',[41,55])->get();

Course::where('duration', '>', 50)->orWhere('name', 'Multimedia And Animation')->get();


DB::table('course_programme')->join('courses', 'course_programme.course_id', '=', 'courses.id')->join('programmes', 'course_programme.programme_id', '=', 'programmes.id')->where('programmes.id', 402)->get();

DB::table('course_programme')->join('courses', 'course_programme.course_id', '=', 'courses.id')->join('programmes', 'course_programme.programme_id', '=', 'programmes.id')->take(11)->get();







            <!-- ->select('courses.course_id', 'contacts.phone', 'orders.price') -->
            
 




