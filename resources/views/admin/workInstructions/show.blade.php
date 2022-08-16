@extends('layouts/contentLayoutMaster')
@section('title', 'Work Instruction')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.workInstruction.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.id') }}
                        </th>
                        <td>
                            {{ $work_instruction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.no_urut') }}
                        </th>
                        <td>
                            {{ $work_instruction->no_urut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.no_ik') }}
                        </th>
                        <td>
                            {{ $work_instruction->no_ik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.work_unit') }}
                        </th>
                        <td>
                            {{ $work_instruction->work_unit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.publish_date') }}
                        </th>
                        <td>
                            {{ $work_instruction->publish_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.reassessment_date') }}
                        </th>
                        <td>
                            {{ $work_instruction->reassessment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.check_date') }}
                        </th>
                        <td>
                            {{ $work_instruction->check_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.tindakan') }}
                        </th>
                        <td>
                            {{ $work_instruction->tindakan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workInstruction.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $work_instruction->keterangan }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.work-instructions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

        </div>
    </div>
@endsection
