<div>
    <!-- FACULTY -->
    <div class="input-group mb-4">
        <div class="input-group">
            <span class="input-group-text">
                <i class="fa fa-black-tie text-muted"></i>
            </span>
            <select id="faculty" name="faculty" class="form-control custom-select bg-white border-left-0 border-md"
                wire:model="selectedFaculty" wire:change="handleSelectedFacultyChange">
                <option value="">Choose your faculty</option>
                <option value="FAS">FAS</option>
                <option value="FEGT">FEGT</option>
                <option value="FAM">FAM</option>
                <option value="LKC FES">LKC FES</option>
                <option value="MK FMHS">MK FMHS</option>
            </select>
        </div>
    </div>

    <!-- COURSE -->
    <div class="input-group mb-4">
        <div class="input-group">
            <span class="input-group-text">
                <i class="fa fa-black-tie text-muted"></i>
            </span>
            @if(empty($courses))
            <select id="course" name="course" class="form-control custom-select bg-secondary-subtle border-left-0 border-md" disabled>
                <option value="">Course (Please select your faculty)</option>
            </select>
            @else
            <select id="course" name="course" class="form-control custom-select bg-white border-left-0 border-md">
                @foreach($courses as $course)
                    <option value="{{$course}}">{{$course}}</option>
                @endforeach
            </select>
            @endif
        </div>
    </div>

    {{--
    <!-- FACULTY -->
    <div class="input-group mb-4">
        <div class="input-group">
            <span class="input-group-text">
                <i class="fa fa-black-tie text-muted"></i>
            </span>
            <select id="faculty" name="faculty" class="form-control custom-select bg-white border-left-0 border-md"
                wire:model="selectedFaculty" wire:change="handleSelectedFacultyChange">
                <option value="">Choose your faculty</option>
                <option value="FAS, FBF">FAS, FBF</option>
                <option value="FEGT, FICT. FSc. ICS">FEGT, FICT. FSc. ICS</option>
                <option value="FAM, FCI">FAM, FCI</option>
                <option value="LKC FES">LKC FES</option>
                <option value="MK FMHS">MK FMHS</option>
            </select>
        </div>
    </div>

    <!-- COURSE (BACKUP) -->
    <div class="input-group mb-4">
        <div class="input-group">
            <span class="input-group-text">
                <i class="fa fa-black-tie text-muted"></i>
            </span>
            <select id="course" name="course" class="form-control custom-select bg-white border-left-0 border-md">
                <option value="">Choose your course</option>
                <option value="Bachelor of Science (Honours) Software Engineering">Bachelor of Science
                    (Honours) Software Engineering</option>
                <option value="Bachelor of Science (Honours) Physics">Bachelor of Science (Honours)
                    Physics</option>
                <option value="Bachelor of Science (Honours) Quantity Surveying">Bachelor of Science
                    (Honours) Quantity Surveying</option>
            </select>
        </div>
    </div> --}}
</div>