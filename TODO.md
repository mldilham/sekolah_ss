# TODO: Recreate Landing Page Display

## Tasks:
- [ ] Update Controller::public() to send count of students and teachers instead of lists
- [ ] Update resources/views/public/index.blade.php to display counts instead of detailed lists for teachers and students
- [ ] Test the landing page to ensure correct display

## Information Gathered:
- Current landing page displays detailed lists of news, gallery, teachers, students, etc.
- User wants to display only counts for students and teachers, keep news and gallery as is
- No JavaScript usage required

## Plan:
- Modify Controller.php method public() to send $jumlah_siswa and $jumlah_guru
- Modify view to show counts in teacher and student sections
- Keep news and gallery sections unchanged
