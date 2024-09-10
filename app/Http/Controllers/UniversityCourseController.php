<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\Department;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\UniversityCourse;

class UniversityCourseController extends Controller
{
    public function index(Request $request)
    {

        $universities = University::where('status', 1)->get();
        $depts = Department::where('status', 1)->get();
        $courses = Course::where('status', 1)->get();
        $levels = CourseLevel::where('status', 1)->get();
        $query = University::whereHas('universityCourses')
            ->select('id', 'name', 'short_name')
            ->where('status', 1);

        // Apply filters only if they are provided

        // Filter by course ID if 'course' is provided
        if ($request->filled('course')) {
            $query->whereHas('universityCourses.course', function ($q) use ($request) {
                $q->where('id', $request->input('course'));
            });
        }

        // Filter by year range if both 'from' and 'to' are provided
        if ($request->filled('from') && $request->filled('to')) {
            $query->whereHas('universityCourses.course', function ($q) use ($request) {
                $q->whereBetween('years', [(int)$request->input('from'), (int)$request->input('to')]);
            });
        }

        // Filter by course level if 'level' is provided
        if ($request->filled('level')) {
            $query->whereHas('universityCourses.course', function ($q) use ($request) {
                $q->where('course_level_id', $request->input('level'));
            });
        }

        // Filter by department if 'dept' is provided
        if ($request->filled('dept')) {
            $query->whereHas('universityCourses.course', function ($q) use ($request) {
                $q->where('department_id', $request->input('dept'));
            });
        }

        // Filter by university ID if 'university' is provided
        if ($request->filled('university')) {
            $query->where('id', $request->input('university'));
        }

        // Apply sorting and pagination
        $data = $query
        ->with(['universityCourses', 'city', 'state', 'country'])
        ->orderBy('name')->paginate(10);

        return view('university_courses.index',compact('data', 'universities', 'depts', 'courses', 'levels'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function count(Request $request)
    {
        $data = University::whereHas('universityCourses')->with('universityCourses')->select('id', 'name', 'short_name')->orderBy('name')->paginate(10);
        return view('university_courses.count',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function list(Request $request)
    {
        $data = UniversityCourse::with(['university:id,name,short_name', 'course:id,name'])->select()->paginate(10);
        return view('university_courses.list',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $universities = University::orderBy('name')->where('status', 1)->get();
        $courses = Course::orderBy('name')->where('status', 1)->get();
        return view('university_courses.create', compact('universities', 'courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'university' => 'required',
        ]);

        $data= [];
        for($i=0; $i<count($request->course); $i++) {
            if(isset($request->course[$i]) && isset($request->available_shifts[$i]) && isset($request->required_documents[$i])) {

                $data[$i] = [
                    'university_id' => $request->university,
                    'course_id' => $request->course[$i],
                    'status' => $request->status[$i] ?? 1,
                    'available_shifts' => implode(',', $request->available_shifts[$i]),
                    'required_documents' => implode(',', $request->required_documents[$i]),
                ];

                UniversityCourse::updateOrCreate(
                    [
                        'university_id' => $request->university,
                        'course_id' => $request->course[$i],
                    ],
                    [
                        'status' => $request->status[$i] ?? 1,
                        'available_shifts' => implode(',', $request->available_shifts[$i]),
                        'required_documents' => implode(',', $request->required_documents[$i]),
                    ]
                );
            }
        }

        return redirect()->route('university-courses.index')->with('success','Record created successfully');
    }

    public function show(UniversityCourse $universityCourse)
    {
        if (!empty($universityCourse)) {

            $data = [
                'universityCourse' => $universityCourse
            ];
            return view('university-courses.show', $data);

        } else {
            return redirect()->route('university-courses.index');
        }
    }

    public function detail($id)
    {
        return UniversityCourse::with(['university', 'course'])->find($id);
    }

    public function edit(UniversityCourse $universityCourse, $id)
    {
        $universityCourse = UniversityCourse::with(['university', 'course'])->find($id);
        return $universityCourse;
    }

    public function update(Request $request, UniversityCourse $universityCourse)
    {
    }

    public function destroy(UniversityCourse $universityCourse)
    {
        UniversityCourse::find($universityCourse->id)->delete();
        return redirect()->route('intake.index')->with('success', 'Deleted successfully');
    }
}
