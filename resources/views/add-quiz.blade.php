<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name="{{ $name }}"></x-navbar>
    <div class=" bg-gray-100 flex flex-col items-center min-h-screen pt-5">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
            @if(!session('quizDetails'))
                <h2 class="text-2xl text-center text-gray-800 mb-6 ">Add Quiz</h2>
                <form action="/add-quiz" method="get" class="space-y-4">
                    <div>
                        <input name="quiz" type="text" placeholder="Enter Quiz Name" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    </div>
                    <div>
                        <select type="text" name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add</button>
                </form>
            @else
                <span class="text-green-500 font-bold">Quiz: {{ session('quizDetails')->name }}</span>
                <h2 class="text-2xl text-center text-gray-800 mb-6 ">Add MCQ's</h2>
                <form action="add-mcq" method="post" class="space-y-4">
                    @csrf
                    <div>
                        <textarea name="question" type="text" placeholder="Enter question Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none"></textarea>
                        @error('question')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input name="a" type="text" placeholder="Enter first Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        @error('a')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input name="b" type="text" placeholder="Enter second Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        @error('b')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input name="c" type="text" placeholder="Enter third Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        @error('c')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input name="d" type="text" placeholder="Enter fourth Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        @error('d')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <select name="correct_ans" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                        <option value="">Select Right Answer</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                        </select>
                        @error('correct_ans')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" name="submit" value="add-more" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Add More</button>
                    <button type="submit" name="submit" value="done" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white">Add and Submit</button>
                    <a class="w-full bg-red-500 block text-center rounded-xl px-4 py-2 text-white" href="/end-quiz">Finished</a>
                </form>
            @endif
        </div>
    </div>
</body>
</html>