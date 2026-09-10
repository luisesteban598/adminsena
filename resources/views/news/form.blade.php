@if ($errors->any())
<div class="alert alert-error">{{ $errors->first() }}</div>
@endif
<div class="news-form-grid">
    <div class="form-group"><label for="title">Título</label><input id="title" type="text" name="title" value="{{ old('title', $news->title ?? '') }}" required></div>
    <div class="form-group"><label for="image">Imagen (opcional)</label><input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp"><small>JPG, PNG o WEBP. Máximo 2 MB.</small></div>
</div>
<div class="form-group"><label for="summary">Resumen</label><textarea id="summary" name="summary" rows="3" maxlength="500" required>{{ old('summary', $news->summary ?? '') }}</textarea></div>
<div class="form-group"><label for="content">Contenido</label><textarea id="content" name="content" rows="9" required>{{ old('content', $news->content ?? '') }}</textarea></div>
<label class="news-publish-toggle"><input type="checkbox" name="is_published" value="1" {{ old('is_published', $news->is_published ?? false) ? 'checked' : '' }}> Publicar esta noticia en el home</label>
<div class="detail-actions"><button type="submit" class="management-primary-action">Guardar noticia</button><a href="{{ route('news.index') }}" class="management-secondary-action">Cancelar</a></div>
